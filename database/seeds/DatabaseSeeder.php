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
            PromotionsSeeder::class,
            ProductSeeder::class,
            CDS_LPSSeeder::class,
            TracksSeeder::class,
            DVDSSeeder::class,
            BookSeeder::class,
            PhysicalProductSeeder::class,
            OnlineProductSeeder::class,
            CitiesSeeder::class,
            DistrictsSeeder::class,
            AddressSeeder::class,
            Product_KindSeeder::class,
            Products_Product_Kinds::class,
            OrderStateSeeder::class,
            OrderSeeder::class,
            OrderDetailSeeder::class
        ]);
    }
}
