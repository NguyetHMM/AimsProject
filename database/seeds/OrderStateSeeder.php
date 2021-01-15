<?php

use Illuminate\Database\Seeder;

class OrderStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $state1 = [
            'id' => 1,
            'name'=> "Đang giao dịch"
        ];

        $state2 = [
            'id' => 2,
            'name' => "Đã thành công"
        ];
        
        $state3 = [
            'id' => 3,
            'name' => "Đã hủy"
        ];

        $states = [$state1,$state2,$state3];

        DB::table('order_states')->insert($states);
    }
}
