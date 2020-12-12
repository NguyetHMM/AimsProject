<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class TracksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $tracks = [];
        for ($key =0; $key<100;$key ++){
            $tracks[$key] = [
                'id' => $key+1,
                'name' => $faker->name()
            ];
        }

        DB::table('tracks')->insert($tracks);
    }
}
