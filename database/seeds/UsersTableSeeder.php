<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [[
            'id' => 1,
            'name' => '山田太郎',
            'email' => 'test1@test.com',
            'password' => Hash::make('12345678'),
            'profile' => '太郎です。タロちゃんと呼んでください。',
            'image' => 'users/1.jpg'],[
            'id' => 2,
            'name' => '鈴木花子',
            'email' => 'test2@test.com',
            'password' => Hash::make('12345678'),
            'profile' => '花子です。ハナちゃんと呼んでください。',
            'image' => 'users/2.jpg'],[
            'id' => 3,
            'name' => '田中一',
            'email' => 'test3@test.com',
            'password' => Hash::make('12345678'),
            'profile' => '一（はじめ）です。ハッちゃんと呼んでください。',
            'image' => 'users/3.jpg'],[
            'id' => 4,
            'name' => '佐藤正',
            'email' => 'test4@test.com',
            'password' => Hash::make('12345678'),
            'profile' => '正（ただし）です。タッちゃんと呼んでください。',
            'image' => 'users/4.jpg'],[
            'id' => 5,
            'name' => '斎藤由美',
            'email' => 'test5@test.com',
            'password' => Hash::make('12345678'),
            'profile' => '由美です。ゆーちゃんと呼んでください。',
            'image' => 'users/5.jpg']];
            
        foreach($users as $user){
            DB::table('users')->insert($user);
        }
    }
}
