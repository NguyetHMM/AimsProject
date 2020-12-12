<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CoversSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $covers = [];
        $covers[0] = [
            'name' => "admin"
        ];
        $covers[1] = [
            'name' => "user"
        ];
        
        DB::table('covers')->insert($covers);
    }
}
