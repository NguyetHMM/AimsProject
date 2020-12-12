<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker =  Faker::create();
        $address = [];
        for($index = 0; $index < 100; $index ++){
            $address[] = [
                'userID' => rand(1,10),
                'cityID' => rand(1,3),
                'districtID' => rand(1,100),
                'description' => $faker->text(100),
            ];

        }
        // dd($address);
        DB::table('address')->insert($address);
    }
}
