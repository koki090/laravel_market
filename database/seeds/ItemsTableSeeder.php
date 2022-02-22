<?php

use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [[
            'id' => 1,
            'user_id' => 1,
            'name' => '古い本',
            'description' => 'とても古い本です。',
            'category_id' => 1,
            'price' => 10000,
            'image' => 'items/1.jpg'
            ],[
            'id' => 2,
            'user_id' => 1,
            'name' => '包丁',
            'description' => 'とてもよく切れます。',
            'category_id' => 2,
            'price' => 1500,
            'image' => 'items/2.jpg'
            ],[
            'id' => 3,
            'user_id' => 2,
            'name' => 'PC関連商品',
            'description' => 'PC周りを快適にします。',
            'category_id' => 3,
            'price' => 5000,
            'image' => 'items/3.jpg'
            ],[
            'id' => 4,
            'user_id' => 2,
            'name' => 'スニーカー',
            'description' => 'スポーツにも使える万能な靴です。',
            'category_id' => 4,
            'price' => 12000,
            'image' => 'items/4.jpg'
            ],[
            'id' => 5,
            'user_id' => 3,
            'name' => 'ブラウン管テレビ',
            'description' => '懐かしのブラウン管テレビです。地上波には対応していません。',
            'category_id' => 5,
            'price' => 700,
            'image' => 'items/5.jpg'
            ],[
            'id' => 6,
            'user_id' => 3,
            'name' => 'メモセット',
            'description' => 'ペンとメモのセットです。',
            'category_id' => 6,
            'price' => 999,
            'image' => 'items/6.jpg'
            ],[
            'id' => 7,
            'user_id' => 4,
            'name' => '中古物件',
            'description' => '合掌造りのおうちです。',
            'category_id' => 7,
            'price' => 12000000,
            'image' => 'items/7.jpg'
            ],[
            'id' => 8,
            'user_id' => 4,
            'name' => '中古車',
            'description' => '自走はしません。パーツ取りなどのどうぞ。',
            'category_id' => 8,
            'price' => 650000,
            'image' => 'items/8.jpg'
            ],[
            'id' => 9,
            'user_id' => 5,
            'name' => 'アヒル',
            'description' => '防水加工はありません。',
            'category_id' => 9,
            'price' => 450,
            'image' => 'items/9.jpg'
            ],[
            'id' => 10,
            'user_id' => 5,
            'name' => '合いびき肉',
            'description' => 'ご注文いただいてから、挽かせていただきます。',
            'category_id' => 10,
            'price' => 398,
            'image' => 'items/10.jpg'
            ],];
            
        foreach($items as $item){
            DB::table('items')->insert($item);
        }
    }
}
