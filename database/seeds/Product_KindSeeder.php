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
                'productCategoryID' => rand(1,3),
                'name' => $kinds[$index],
            ];

        }
        // dd($product_kinds);
        DB::table('product_kinds')->insert($product_kinds);
    }
}
