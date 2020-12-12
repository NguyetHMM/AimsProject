<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class PromotionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $unixTimestamp = '1607731200';
        $faker = Faker::create();
        $promotions = [];
        for($key =0; $key <10; $key++){
            $promotions[$key] = [
                'percent' => rand(1,9)*10,
                'start_time' => now(),
                'end_time' => $faker->dateTimeBetween('now', '+5 days'),
                'numberPromotion' => rand(2,10)
            ];
        }
        
        
        DB::table('promotions')->insert($promotions);
    }
}
