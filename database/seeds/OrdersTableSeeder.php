<?php

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = [[
            'id' => 1,
            'user_id' => 1,
            'item_id' => 3,],[
            'id' => 2,
            'user_id' => 1,
            'item_id' => 5,],[
            'id' => 3,
            'user_id' => 1,
            'item_id' => 7,],];
            
        foreach($orders as $order){
            DB::table('orders')->insert($order);
        }
    }
}
