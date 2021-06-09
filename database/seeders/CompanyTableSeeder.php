<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert(
            [
                ['name' => 'Microsoft', 'created_at' => Carbon::now()],
                ['name' => 'Apple', 'created_at' => Carbon::now()],
            ]
        );
    }
}
