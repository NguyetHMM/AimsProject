<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PhysicalProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker =  Faker::create();
        $physical_products = [];
        for($index = 0; $index < 100; $index ++){
            $physical_products[] = [
                'productID' => $index +1,
                'barcode' => $faker->name(20),
                'description' => $faker->text(50),
                'quantity' => rand(1,100),
                'length' => rand(1,100)/100,
                'width' => rand(1,100)/100,
                'heigth' => rand(1,100)/100,
                'weigh' => rand(1,1000)/1000,
                'inputDay' => now(),
            ];
        }
        DB::table('physical_products')->insert($physical_products);
    }
}
