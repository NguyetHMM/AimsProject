<?php

use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        for($index = 0; $index < 20; $index ++){
            $order[] = [
                'userID' => rand(1,10),
                'stateID' => rand(1,3),
                'addressID' => rand(1,100),
                'orderDate' => now(),
                'shipfee' => rand(0,30)
            ];
        }
        DB::table('orders')->insert($order);
    }
}
