<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker =  Faker::create();
        $books = [];
        $bookcategory = ["comic", "photobook", "story"];
        for($index = 0; $index < 100; $index ++){
            $lgRandom = rand(0,2);
            $books[] = [
                'productID' => $index +1,
                'coverID' => rand(1,2),
                'author' => $faker->name(),
                'publisher' => $faker->name(),
                'publicationDate' => now(),
                'releaseDate' => now(),
                'pages' => rand(50,1000),
                'category' => $bookcategory[$lgRandom]
            ];

        }
        // dd($books);
        DB::table('books')->insert($books);
    }
}
