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
        foreach(glob(storage_path("app/imagesDefault/")."/*",GLOB_ONLYDIR ) as $userdir){//ユーザ名のフォルダ(フルパス)
            echo "check dir : ".$userdir."\n";
            $firstname = explode("@", basename($userdir),2);
            echo "MakeUser firstname: ".$firstname[0]."\n";
            echo "MakeUser user id: ".basename($userdir)."\n";
            User::create([
                'email'=>basename($userdir),
                'lastname'=>"東横",
                'firstname'=>$firstname[0],
                'password'=>"1045",
            ]);
        }
    }
}
