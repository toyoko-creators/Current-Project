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
       /* foreach(glob(storage_path("app/public/imagesDefault")."/*",GLOB_ONLYDIR ) as $userdir){//ユーザ名のフォルダ(フルパス)
            foreach(glob(($userdir).'/*',GLOB_ONLYDIR ) as $weartypedir){//トップ、ボトムのフォルダ名探索
                if(basename($weartypedir) !="Top" && basename($weartypedir) !="Bottom" ){continue;}//名前違いのものは無視
                foreach(glob(($weartypedir).'/*',GLOB_NOSORT ) as $imagefile){//画像ファイル一覧取得
                    echo "\n";
                    echo "\n";
                    $uploadfileName = uniqid().".".pathinfo( $imagefile, PATHINFO_EXTENSION);
                    echo "uploadfileName : ".$uploadfileName."\n";
                    $uploadfilepath = storage_path("public/image")."/".basename($userdir)."/".basename($weartypedir);
                    echo "uploadfilepath : ".$uploadfilepath."\n";
                    $fromfile = Storage::get(Storage::disk('local')->url("imageDefault/".basename($userdir)."/".basename($weartypedir)."/".basename($imagefile)));
                    echo "uploadfilepath : ".$uploadfilepath."\n";
                    $fromfile->storeAs("public/image/".basename($userdir)."/".basename($weartypedir),basename($imagefile));
                    Clothe::create([
                        'ImageFile'=>$uploadfileName,
                        'email'=>basename($userdir),
                        'WearType'=>basename($weartypedir)
                    ]);
                }
            }
        }*/
    }
}
