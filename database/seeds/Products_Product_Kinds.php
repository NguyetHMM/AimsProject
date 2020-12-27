<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class Products_Product_Kinds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product_kinds = [];
        for($i=0;$i<25;$i++){
            $product_kinds[] = [
                'productID' => $i+1,
                'productKindID' => rand(8,10),
            ];
        }
        for($i=25;$i<50;$i++){
            $product_kinds[] = [
                'productID' => $i+1,
                'productKindID' => rand(5,7),
            ];
        }

        for($i=50;$i<100;$i++){
            $product_kinds[] = [
                'productID' => $i+1,
                'productKindID' => rand(1,4),
            ];
        }

        DB::table('products_product_kinds')->insert($product_kinds);
    }
}
