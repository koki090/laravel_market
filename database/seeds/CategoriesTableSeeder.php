<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [[
            'id' => 1,
            'name' => '本'],[
            'id' => 2,
            'name' => 'キッチン用品'],[
            'id' => 3,
            'name' => 'PC機器'],[
            'id' => 4,
            'name' => 'ファッション'],[
            'id' => 5,
            'name' => '大型家電'],[
            'id' => 6,
            'name' => '文房具'],[
            'id' => 7,
            'name' => '家'],[
            'id' => 8,
            'name' => '車'],[
            'id' => 9,
            'name' => 'ホビー'],[
            'id' => 10,
            'name' => '食品']];
            
        foreach($categories as $category){
            DB::table('categories')->insert($category);
        }
    }
}
