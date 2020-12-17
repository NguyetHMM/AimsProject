<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class Product_KindSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker =  Faker::create();
        $product_kinds = [];
        $kinds = ["Romatic", "Action", "Detective", "Humor"];
        for($index = 0; $index < 4; $index ++){
            $product_kinds[] = [
                'productCategoryID' => 1,
                'name' => rand($kind[0],$kind[4]),
            ];

        }
        $product_kinds[4] = [
            'productCategoryID' => 2,
            'name' => 'HD-DVD',
        ];
        $product_kinds[5] = [
            'productCategoryID' => 2,
            'name' => 'Full-HD-DVD',
        ];
        $product_kinds[6] = [
            'productCategoryID' => 2,
            'name' => 'Blu-ray',
        ];
        for($index = 7; $index < 10; $index ++){
            $product_kinds[] = [
                'productCategoryID' => 3,
                'name' => rand($kind[0],$kind[4]),
            ];
        }
        // dd($product_kinds);
        DB::table('product_kinds')->insert($product_kinds);
    }
}
