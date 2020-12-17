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
        for($index = 0; $index < 25; $index ++){
            $value = rand(1,500);
            $lgRandom = rand(0,2);
            $products[] = [
                'productCategoryID' => 3,
                'productTypeID' => rand(1,2),
                'title' => $faker->name(10),
                'value' => $value,
                'price' => rand($value*0.3, $value*1.5),
                'language' => $languages[$lgRandom],
                
            ];

        }

        for($index = 25; $index < 50; $index ++){
            $value = rand(1,500);
            $lgRandom = rand(0,2);
            $products[] = [
                'productCategoryID' => 2,
                'productTypeID' => rand(1,2),
                'title' => $faker->name(10),
                'value' => $value,
                'price' => rand($value*0.3, $value*1.5),
                'language' => $languages[$lgRandom],
                
            ];

        }
        
        $cd_lp = [1,4];
        for($index = 50; $index < 100; $index ++){
            $a = rand(0,1);
            $value = rand(1,500);
            $lgRandom = rand(0,2);
            $products[] = [
                'productCategoryID' => $cd_lp[$a],
                'productTypeID' => rand(1,2),
                'title' => $faker->name(10),
                'value' => $value,
                'price' => rand($value*0.3, $value*1.5),
                'language' => $languages[$lgRandom],
                
            ];

        }
        // dd($products);
        DB::table('products')->insert($products);
    }
}
