<?php

use App\Clothe;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ClothesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //追加
        foreach(glob('./imagesDefault/*',GLOB_ONLYDIR ) as $userdir){//ユーザ名のフォルダ(フルパス)
            echo "check dir : ".basename($userdir);
            foreach(glob(($userdir).'/*',GLOB_ONLYDIR ) as $weartypedir){//トップ、ボトムのフォルダ名探索
                if(basename($weartypedir) !="Top" && basename($weartypedir) !="Bottom" ){continue;}//名前違いのものは無視
                foreach(glob(($weartypedir).'/*',GLOB_ONLYDIR ) as $imagefile){//画像ファイル一覧取得
                    $storagefileName = uniqid(mt_rand(), true);
                    Storage::disk('public')->putFileAs("images/".basename($userdir)."/".basename($weartypedir),file($imagefile), $storagefileName);
                    Clothe::create([
                        'ImageFile'=>$storagefileName,
                        'email'=>basename($userdir),
                        'WearType'=>basename($weartypedir)
                    ]);
                }
            }
        }
    }
}
