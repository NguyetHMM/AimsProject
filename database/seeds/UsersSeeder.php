<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker =  Faker::create();
        $users = [];
        foreach(range(1,10) as $index){
            $users[] = [
                'name' => $faker->name,
                'email' => "Trung$index@gmail.com",
                'password' => bcrypt('trung1234'),
                'username' => "trung$index",
                'roleID' => rand(1,2)
            ];

        }
        // dd($users);
        DB::table('users')->insert($users);
    }
}
