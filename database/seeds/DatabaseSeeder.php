<?php

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
        // $this->call(UsersTableSeeder::class);
        $this->call([
            RolesSeeder::class,
            UsersSeeder::class,
            ProductCategoriesSeeder::class,
            ProductTypesSeeder::class,
            CoversSeeder::class,
            
        ]);
    }
}
