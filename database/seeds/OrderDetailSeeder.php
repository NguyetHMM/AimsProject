<?php

use Illuminate\Database\Seeder;

class OrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($index = 0; $index < 100; $index ++){
            $order_detail[] = [
                'orderID' => rand(1,20),
                'productID' => $index + 1,
                'productName' => 'Test order detail '.($index + 1),
                'quantity' => rand(1,100),
                'price' => rand(30,500)
            ];
        }
        DB::table('order_details')->insert($order_detail);        
    }
}
