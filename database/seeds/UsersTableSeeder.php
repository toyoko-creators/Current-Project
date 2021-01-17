<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        User::truncate();
        $i = 0;
        $firstnamarray[] =["太郎","次郎","三郎","四郎"];
        foreach($firstnamarray as $firstname){//ユーザ名のフォルダ(フルパス)
        //特定のデータを追加
            User::create([
                'email'=>(string)($i+1045)."@gmail.com",
                'lastname'=>"東横",
                'firstname'=>current($firstname),
                'password'=>"1045",
            ]);
        }
    }
}
