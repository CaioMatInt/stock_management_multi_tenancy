<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                [   'id' => 1,
                    'email' => 'rafael@turnoverbnb.com',
                    'name' => "Rafael Cardoso",
                    'company_id' => 1,
                    'password' => Hash::make('turnoverbnb')],
                [   'id' => 2,
                    'email' => 'stevejobs@apple.com',
                    'name' => "Steve Jobs",
                    'company_id' => 2,
                    'password' => Hash::make('turnoverbnb')],
            ]
        );
    }
}
