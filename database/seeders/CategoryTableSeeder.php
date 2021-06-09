<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(
            [
                [
                    'name' => 'Alimentos',
                    'category_id' => null,
                    'user_id' => 1,
                    'company_id' => 1,
                    'created_at' => Carbon::now()
                ],
                [   'name' => 'Bebidas',
                    'user_id' => 1,
                    'company_id' => 1,
                    'category_id' => null,
                    'created_at' => Carbon::now()
                ],
                [   'name' => 'Higiene e Perfumaria',
                    'user_id' => 1,
                    'company_id' => 1,
                    'category_id' => null,
                    'created_at' => Carbon::now()
                ],
                [   'name' => 'Limpeza',
                    'user_id' => 1,
                    'company_id' => 1,
                    'category_id' => null,
                    'created_at' => Carbon::now()
                ],
                [   'name' => 'Descartáveis',
                    'user_id' => 1,
                    'company_id' => 1,
                    'category_id' => 4,
                    'created_at' => Carbon::now()
                ],
                [   'name' => 'Lavanderia',
                    'user_id' => 1,
                    'company_id' => 1,
                    'category_id' => 4,
                    'created_at' => Carbon::now()
                ],
                // Company 2 Categories
                [   'name' => 'Pets',
                    'user_id' => 2,
                    'company_id' => 2,
                    'category_id' => null,
                    'created_at' => Carbon::now()
                ],
                [   'name' => 'Alimentos',
                    'user_id' => 2,
                    'company_id' => 2,
                    'category_id' => null,
                    'created_at' => Carbon::now()
                ],
                [   'name' => 'Snacks',
                    'user_id' => 2,
                    'company_id' => 2,
                    'category_id' => 8,
                    'created_at' => Carbon::now()
                ],


            ]
        );
    }
}
