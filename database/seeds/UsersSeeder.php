<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

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
        for($index=0;$index<10;$index++){
            $users[] = [
                'name' => $faker->name,
                'email' => "trung$index@gmail.com",
                'password' => bcrypt('trung1234'),
                'username' => "trung$index",
                'roleID' => rand(1,2)
            ];

        }
        // dd($users);
        DB::table('users')->insert($users);
    }
}
