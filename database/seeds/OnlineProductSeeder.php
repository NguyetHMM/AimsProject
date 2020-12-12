<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class OnlineProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker =  Faker::create();
        $online_products = [];
        for($index = 0; $index < 100; $index ++){
            
            $online_products[] = [
                'productID' => $index + 1,
                'content' => $faker->text(400)
            ];

        }
        // dd($online_products);
        DB::table('online_products')->insert($online_products);
    }
}
