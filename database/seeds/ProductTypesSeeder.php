<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProductTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product_types = [];
        $product_types[0] = [
            'name' => "online"
        ];
        $product_types[1] = [
            'name' => "physical"
        ];
        
        DB::table('product_types')->insert($product_types);
    }
}
