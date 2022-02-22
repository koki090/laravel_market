<?php

use Illuminate\Database\Seeder;

class LikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $likes = [[
            'id' => 1,
            'user_id' => 1,
            'item_id' => 3,],[
            'id' => 2,
            'user_id' => 1,
            'item_id' => 5,],[
            'id' => 3,
            'user_id' => 1,
            'item_id' => 7,],[
            'id' => 4,
            'user_id' => 2,
            'item_id' => 2,],[
            'id' => 5,
            'user_id' => 2,
            'item_id' => 9,],[
            'id' => 6,
            'user_id' => 3,
            'item_id' => 5,],[
            'id' => 7,
            'user_id' => 4,
            'item_id' => 10,],];
            
        foreach($likes as $like){
            DB::table('likes')->insert($like);
        }
    }
}
