<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Category as CategoryModel;
use App\Category;
use App\Product as ProductModel;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(CategoryModel $categoryModel, ProductModel $productModel, $code = null)
    {
        $isSubcategory = (bool)preg_match('/subcategorias/', request()->getPathInfo());
        $categories = $categoryModel->where('category', $code)->get();
        $category = $isSubcategory ? $categoryModel->where('code', $code)->first() : '';

        return view('admin.index', [
            'isSubcategory' => $isSubcategory,
            'categories' => $categories,
            'category' => $category,
            'products' => $productModel->get(),
            'backUrl' => URL::previous(),
        ]);
    }

    public function categoryNew(Request $request)
    {
        return view('admin.category-new', [
            'backUrl' => URL::previous(),
        ]);
    }

    public function categorySave(Request $request)
    {

        $category = Category::find($request->get('code'));

        if (!$category) {
            $category = new Category();
        }

        if ($request->has('category_code')) {
            $category->category = $request->get('category_code');
        }
        $category->code = $request->get('code');
        $category->name = $request->get('name');
        $category->status = $request->get('status');
        $category->description = (string)$request->get('description');


        $category->save();

        if ($category) {
            return redirect('/admin/categorias/' . $category->code . '/editar?save=ok');
        }
    }

    public function categoryEdit($code, CategoryModel $categoryModel)
    {

        $isSubcategory = (bool)request()->has('subcategory');

        return view('admin.category-edit', [
            'isSubcategory' => $isSubcategory,
            'category' => $categoryModel->findOrFail($code),
            'backUrl' => '/admin',
        ]);
    }

    public function categoryRemove($category, Request $request, CategoryModel $categoryModel, ProductModel $productModel)
    {
        $category = $categoryModel->findOrFail($category);

        if ($request->method() == 'POST') {

            $products = $productModel->where('category', $category->code)->get();

            foreach ($products as $product) {
                @unlink(public_path('images/produtos/marked/category-' . $product->image));
                @unlink(public_path('images/produtos/marked/' . $product->image));
                $product->delete();
            }

            $category->delete();

            return redirect('/admin');
        } else {
            return view('admin.category-remove', [
                'category' => $category,
                'backUrl' => URL::previous()
            ]);
        }
    }

    public function categoryProducts($category, CategoryModel $categoryModel, ProductModel $productModel)
    {
        $code = $category;
        $category = $categoryModel->findOrFail($code);
        $parentCategory = $categoryModel->where('code', $category->category)->first();
        $products = $productModel->where('category', $code)->get();
        $backUrl = URL::previous();

        return view('admin.category-products', compact(
                'category',
                'parentCategory',
                'products',
                'backUrl'
            )
        );
    }

    public function categoryImage($category, Request $request, CategoryModel $categoryModel)
    {
        if ($request->get('category') == '1') {
            $categoryObj = $categoryModel->where('code', $category)->first();
            if ($categoryObj) {
                $category = $categoryObj->category;
            }
        }

        $categoryModel->where('code', $category)->update(['image' => '']);
        $categoryModel->where('code', $category)->update(['image' => $request->get('imagem')]);

        return 'ok';
    }

    public function productNew($category, Request $request, CategoryModel $categoryModel)
    {
        return view('admin.product-new', [
            'category' => $categoryModel->findOrFail($category),
            'categories' => $categoryModel->all(),
            'backUrl' => URL::previous(),
            'previousLink' => $request->get('link')
        ]);
    }

    public function productRemove($code, Request $request, ProductModel $productModel)
    {
        $product = $productModel->findOrFail($code);

        if ($request->method() == 'POST') {

            $category = $product->category;

            @unlink(public_path('images/produtos/marked/category-' . $product->image));
            @unlink(public_path('images/produtos/marked/' . $product->image));

            $product->delete();

            return redirect('/admin/produtos/' . $category);
        } else {
            return view('admin.product-remove', [
                'product' => $product,
                'backUrl' => URL::previous()
            ]);
        }
    }

    public function productEdit($code, Request $request, CategoryModel $categoryModel, ProductModel $productModel)
    {
        $product = $productModel->findOrFail($code);

        if ($request->get('previous_link') == 'categoria') {
            $backUrl = url('/admin/index');
        } else {
            $backUrl = url('/admin/produtos/' . $product->category);
        }

        return view('admin.product-edit', [
            'product' => $product,
            'category' => $categoryModel->findOrFail($product->category),
            'categories' => $categoryModel->all(),
            'backUrl' => $backUrl
        ]);
    }

    public function productSave(Request $request)
    {
        $file = $request->file('image');

        $product = Product::find($request->get('code'));

        $update_image = false;

        if ($request->get('code_old') != $request->get('code')) {
            $old_product = Product::find($request->get('code_old'));
            if ($old_product) {
                $image_data = explode('.', $old_product->image);
                $file_name = $request->get('code') . '.' . end($image_data);
                $path = public_path('/images/produtos/marked');
                @rename($path . "/category-" . $old_product->image, $path . "/category-" . $file_name);
                @rename($path . "/" . $old_product->image, $path . "/" . $file_name);
                $update_image = true;
            }
        }

        if (!$product) {
            $product = new Product();
        }

        if ($file) {
            $file_name = $request->get('code') . '.' . $file->getClientOriginalExtension();
            $destination_category_path = public_path('images/produtos/marked/category-' . $file_name);
            $destination_thumb_path = public_path('images/produtos/marked/thumb-' . $file_name);
            $destination_mini_path = public_path('images/produtos/marked/mini-' . $file_name);
            $destination_path = public_path('images/produtos/marked/' . $file_name);
            $img1 = \Image::make($file->getRealPath());
            $img2 = \Image::make($file->getRealPath());
            $img3 = \Image::make($file->getRealPath());
            $img4 = \Image::make($file->getRealPath());
            $watermark = \Image::make(public_path('/images/watermark-shadow.png'));


            // Imagem da categoria
            $img1->resize(640, 480);
            $img1->save($destination_category_path, 100);

            // Imagem thumnail
            $img2->fit(300);
            $img2->save($destination_thumb_path, 100);

            // Imagem mini
            $img3->fit(100);
            $img3->save($destination_mini_path, 100);

            // Imagem do produto
            $img4->resize(640, 480);
            $img4->insert($watermark, 'bottom-right', 20, 20);
            $img4->save($destination_path, 100);
        }

        $product->code = $request->get('code');
        $product->colors = $request->get('colors');
        $product->category = $request->get('category');
        $product->status = $request->get('status');
        $product->description = (string)$request->get('description');

        if ($file || $update_image) {
            $product->image = $file_name;
        }

        $product->save();

        if ($product) {
            return redirect('/admin/produtos/' . $product->code . '/editar?save=ok');
        }
    }

    public function banner()
    {
        return view('admin.banner', [
            'banners' => (new Banner())->orderBy('order')->get()
        ]);
    }

    public function bannerSave(Request $request)
    {
        $fields = $request->except(['_token']);

        for ($i = 0; $i < count($fields['id']); $i++) {

            $banner = Banner::find($fields['id'][$i]) ?? new Banner();

            if ($banner->id == 0) {
                $banner->id = $fields['id'][$i];
            }

            $banner->title = $fields['title'][$i];
            $banner->subtitle = $fields['subtitle'][$i];
            $banner->link = $fields['link'][$i];
            $banner->order = $fields['order'][$i];
            $banner->status = isset($fields['status-' . ($i + 1)]) ? 1 : 0;

            if (isset($fields['image'][$i])) {
                if (strlen($fields['image'][$i]) > 0) {

                    $image = $request->file('image')[$i];

                    $filename = $image->store('', ['disk' => 'banner']);

                    if ($banner->image) {
                        Storage::delete($banner->image);
                    }

                    $banner->image = $filename;
                }
            }

            $banner->save();
        }

        return redirect('/admin/banner');
    }
}
