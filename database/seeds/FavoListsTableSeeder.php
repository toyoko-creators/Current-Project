<?php

use App\Favolist;
use Illuminate\Database\Seeder;

class FavoListsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        Favolist::truncate();
        //特定のデータを追加
        //Favolist::create([
        //    'email'=>"1045@gmail.com",
        //    'TopFile'=>"0.png",
        //    'BottomFile'=>"0.png",
        //]);
    }
}
