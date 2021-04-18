<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['mov', 'Conjuntos', 'Beleza, modernidade, estética e funcionalidade!'],
            ['ca', 'Cadeiras De Auditório', 'Funcionalidade, estética e modernidade!'],
            ['cg', 'Cadeiras Giratórias', 'Ergonomia em produtos de qualidade!'],
            ['cf', 'Cadeiras Fixas', 'A qualidade dos materiais garantem durabilidade!'],
            ['po', 'Poltronas', 'Conforto que você merece durante seu horário de trabalho!'],
            ['pol_dec', 'Poltronas Decorativas', 'Confortáveis, bonitas e duráveis!'],
            ['so', 'Sofás', 'Materiais de primeira linha aliados a beleza!']
        ];

        foreach ($categories as $code => $data) {
            \Illuminate\Support\Facades\DB::table('categories')->insert([
                'code' => $data[0],
                'name' => $data[1],
                'description' => $data[2],
                'status' => 1,
                'image' => ''
            ]);
        }
    }
}
