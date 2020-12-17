<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DVDSSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker =  Faker::create();
        $dvds = [];
        $languges = ["Vietnamese", "Enlish", "Korea language"];
        $kindDVDs = ["Blu-ray", "HD-DVD", "Full-HD-DVD"];
        $kindVideos = ["Odd movie", "Series movie", "TV series"];
        for($index = 0; $index < 25; $index ++){
            $rd = rand(0,2);
            $dvds[] = [
                'productID' => $index+26,
                'director' => $faker->name(),
                'dvdKind' => $kindDVDs[$rd],
                'videoKind' => $kindVideos[$rd],
                'studio' => $faker->name(),
                'subtitles' => $languges[$rd],
                'runtime' => rand(360, 5000),
                'releaseDate' => now()
            ];

        }
        // dd($dvds);
        DB::table('dvds')->insert($dvds);
    }
}
