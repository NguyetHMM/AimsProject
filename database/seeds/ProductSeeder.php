<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker =  Faker::create();
        $products = [];
        $languages = ["Vietnamese", "English", "Korea language"];
        for($index = 0; $index < 100; $index ++){
            $value = rand(200000,500000);
            $lgRandom = rand(0,2);
            $products[] = [
                'productCategoryID' => rand(1,3),
                'productTypeID' => rand(1,2),
                'title' => $faker->name(10),
                'value' => $value,
                'price' => rand($value*0.3, $value*1.5),
                'language' => $languages[$lgRandom],
                'promotionID' => rand(1,10)
            ];

        }
        // dd($products);
        DB::table('products')->insert($products);
    }
}
