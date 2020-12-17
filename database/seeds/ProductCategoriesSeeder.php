<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [];
        $categories[0] = [
            'name' => "cds"
        ];
        $categories[1] = [
            'name' => "dvds"
        ];
        $categories[2] = [
            'name' => "books"
        ];
        $categories[3] = [
            'name' => "lps"            
        ];
        DB::table('product_categories')->insert($categories);
    }
}
