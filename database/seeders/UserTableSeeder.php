<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
                [
                    'email' => 'bill@microsoft.com',
                    'name' => "Bill Gates",
                    'company_id' => 1,
                    'password' => Hash::make('123456'),
                    'created_at' => Carbon::now()],
                [
                    'email' => 'stevejobs@apple.com',
                    'name' => "Steve Jobs",
                    'company_id' => 2,
                    'password' => Hash::make('123456'),
                    'created_at' => Carbon::now()],
            ]
        );
    }
}
