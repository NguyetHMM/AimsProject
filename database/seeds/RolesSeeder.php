<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [];
        $roles[0] = [
            'name' => "admin"
        ];
        $roles[1] = [
            'name' => "user"
        ];
        
        DB::table('roles')->insert($roles);
    }
}
