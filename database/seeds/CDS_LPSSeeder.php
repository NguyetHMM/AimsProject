<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CDS_LPSSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $unixTimestamp = 1607731200;
        $faker =  Faker::create();
        $cds_lps = [];
        $musicType = ["POPs", "Ballad", "RAP"];
        for ($index =0; $index < 10; $index++){
            $lgRandom = rand(0,2);
            $cds_lps[] = [
                'musicType' => $musicType[$lgRandom],
                'productID' => $index+1,
                'artists' => $faker->name(),
                'recordLabel' => $faker->name(),
                'releaseDate' => $faker->date('Y-m-d', $unixTimestamp)
            ];
        }
        // dd($cds_lps);
        DB::table('cds_lps')->insert($cds_lps);
    }
}
