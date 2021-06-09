<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert(
            [
                ['name' => 'Sabão Líquido',
                    'sku' => '145ERFG',
                    'image_path' => 'https://images-shoptime.b2w.io/produtos/01/00/img/1636711/9/1636711916_1GG.jpg',
                    'price' => 23.99,
                    'quantity' => 15,
                    'user_id' => 1,
                    'company_id' => 1,
                    'created_at' => Carbon::now()
                ],
                ['name' => 'Sabão em Pó',
                    'sku' => '854ERFG',
                    'image_path' => 'https://protelimp.com.br/wp-content/uploads/sab%C3%A3o-em-p%C3%B3-1kg-omo-multia%C3%A7%C3%A3o-.jpg',
                    'price' => 20.99,
                    'quantity' => 10,
                    'user_id' => 2,
                    'company_id' => 2,
                    'created_at' => Carbon::now()
                ],
            ]
        );
    }
}
