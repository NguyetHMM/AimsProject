<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DistrictsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker =  Faker::create();
        $districts = [];
        for($index = 0; $index < 100; $index ++){
            $districts[] = [
                'id' => $index +1,
                'name' => $faker->name(),
                'cityID' => rand(1,3)
            ];

        }
        // dd($districts);
        DB::table('districts')->insert($districts);
    }
}
