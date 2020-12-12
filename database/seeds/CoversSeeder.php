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
            'name' => "paperback"
        ];
        $covers[1] = [
            'name' => "hardcover"
        ];
        
        DB::table('covers')->insert($covers);
    }
}
