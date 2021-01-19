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
        /*foreach(glob(storage_path("app/imagesDefault").'/*',GLOB_ONLYDIR ) as $userdir){//ユーザ名のフォルダ(フルパス)
            echo "check dir : ".$userdir."\n";
            foreach(glob(($userdir).'/*',GLOB_ONLYDIR ) as $weartypedir){//トップ、ボトムのフォルダ名探索
                echo "check dir : ".$weartypedir."\n";
                if(basename($weartypedir) !="Top" && basename($weartypedir) !="Bottom" ){continue;}//名前違いのものは無視
                foreach(glob(($weartypedir).'/*',GLOB_NOSORT ) as $imagefile){//画像ファイル一覧取得
                    echo "\n";
                    echo $imagefile;
                    echo "\n";
                    $uploadfileName = uniqid().".".pathinfo( $imagefile, PATHINFO_EXTENSION);
                    $uploadfilepath = storage_path("/app/public".basename($userdir)."/".basename($weartypedir));
                    echo "To   : ".$uploadfilepath."/".$uploadfileName."\n";
                    echo "from : ".$imagefile."\n";
                    echo "Upfilename : ".$uploadfileName."\n";
                    $fromfile = Storage::get($imagefile);
                    echo "Storage::get :Success\n";
                    $fromfile->storeAs($uploadfilepath,$uploadfileName);
                    echo "Storage::copy :Success\n";
                    Clothe::create([
                        'ImageFile'=>$uploadfileName,
                        'email'=>basename($userdir),
                        'WearType'=>basename($weartypedir)
                    ]);
                    echo "Clothe::create :Success\n";
                }
            }
        }*/
    }
}
