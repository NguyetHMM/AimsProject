<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $city = ["Ha Noi", "Da Nang", "TP. Ho Chi Minh"];
        $cities = [];
        for($index = 0;$index < 3;$index++){
            $cities[$index] = [
                'id' => $index+1,
                'name' => $city[$index]
            ];
        }
        // dd($cities);
        DB::table('cities')->insert($cities);
    }
}
