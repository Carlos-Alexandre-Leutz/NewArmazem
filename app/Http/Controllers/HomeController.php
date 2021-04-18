<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Category;
use App\Mail\BudgetSent;
use App\Mail\ContactSent;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

class HomeController extends Controller
{
    public function index($category = null)
    {

        $route = Route::current();

        $hasCategory = isset($route->parameters()['category']);

        $categories = $hasCategory
            ? Category::where('status', '1')->where('category', $category)->get()
            : Category::where('status', '1')->whereNull('category')->get();

        if (!$hasCategory) {
            $i = 0;
            foreach ($categories as $row) {
                if ($row->subcategories->count() == 0) {
                    unset($categories[$i]);
                }
                $i++;
            }
        }

        $banners = Banner::where('status', '1')->orderBy('order')->get();

        $parentCategory = $hasCategory
            ? Category::where('code', $category)->first()
            : null;

        return view(
            'welcome',
            compact(
                'parentCategory',
                'banners',
                'categories',
                'hasCategory'
            )
        );
    }

    public function newIndex(){
        return view(
            'newhome'
        );
    }

    public function product($code = null)
    {
        $product = Product::findOrFail($code);

        return view('product', [
            'product' => $product,
            'category' => Category::where('code', $product->category)->first(),
            'categories' => Category::where('status', '1')->get()
        ]);
    }

    public function products($category)
    {
        $category = Category::where('code', $category)->first();
        $parentCategory = Category::where('code', $category->category)->first();
        $categories = Category::where('status', '1')->get();
        $products = Product::where('status', '1')->where('category', $category->code)->get();

        return view('products', compact(
                'parentCategory',
                'category',
                'categories',
                'products'
            )
        );
    }

    public function contact(Request $request)
    {
        Mail::to(getenv('MAIL_TO_ADDRESS'))->send(new ContactSent($request->all()));
    }

    public function budget(Request $request)
    {
        Mail::to(getenv('MAIL_TO_ADDRESS'))->send(new BudgetSent($request->all()));
    }
}
