<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $categories = [
            'mov' => 'Conjuntos',
            'ca' => 'Cadeiras de Auditório',
            'cg' => 'Cadeiras Giratórias',
            'cf' => 'Cadeiras Fixas',
            'po' => 'Poltronas',
            'pol_dec' => 'Poltronas Decorativas',
            'so' => 'Sofás'
        ];

        foreach ($categories as $code => $name) {

            $categoriesProducts[$code] = array_map(function ($product) use ($code) {

                $path = '/images/produtos/' . basename($product);

                $file = explode('.', basename($product));

                list($product_code, $image_extension) = $file;

                $img = \Image::make(public_path($path));
                $watermark = Image::make(public_path('/images/watermark.png'));
                $img->insert($watermark, 'bottom-right', 10, 10);

                $img->save(public_path(str_replace('produtos', 'produtos/marked', $path)));

                \Illuminate\Support\Facades\DB::table('products')->insert([
//                print_r([
                    'code' => $product_code,
                    'category' => $code,
                    'image' => $product_code . '.' . $image_extension,
                    'description' => '',
                    'status' => 1
                ]);

            }, File::glob(public_path('images/produtos/' . $code . '_*')));
        }
    }
}
