<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CompanyTableSeeder::class,
            UserTableSeeder::class,
            ProductTableSeeder::class,
            CategoryTableSeeder::class,
            StateTableSeeder::class
        ]);
    }
}
