<?php

use App\Clothe;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Console\Command;

class ClothesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(glob(storage_path("app/imagesDefault").'/*',GLOB_ONLYDIR ) as $userdir){//ユーザ名のフォルダ(フルパス)
            $this->command->info( "check dir : ".$userdir);
            foreach(glob(($userdir).'/*',GLOB_ONLYDIR ) as $weartypedir){//トップ、ボトムのフォルダ名探索
                $this->command->info( "check dir : ".$weartypedir);
                if(basename($weartypedir) !="Top" && basename($weartypedir) !="Bottom" ){continue;}//名前違いのものは無視
                foreach(glob(($weartypedir).'/*',GLOB_NOSORT ) as $imagefile){//画像ファイル一覧取得
                    echo "\n";
                    $this->command->info($imagefile);
                    echo "\n";
                    $uploadfileName = uniqid().".".pathinfo( $imagefile, PATHINFO_EXTENSION);
                    $uploadfilepath = storage_path("public/image/".basename($userdir)."/".basename($weartypedir));
                    $this->command->info( "To   : ".$uploadfilepath."/".$uploadfileName);
                    $this->command->info( "from : ".$imagefile);
                    $this->command->info( "Upfilename : ".$uploadfileName);
                    $fromfile = Storage::get(url(Storage::disk('local')->url("imageDefault/".basename($userdir).basename($weartypedir).basename($imagefile))));
                    $this->command->info( "Storage::get :Success");
                    $fromfile->storeAs($uploadfilepath,$uploadfileName);
                    $this->command->info( "Storage::copy :Success\n");
                    Clothe::create([
                        'ImageFile'=>$uploadfileName,
                        'email'=>basename($userdir),
                        'WearType'=>basename($weartypedir)
                    ]);
                    $this->command->info( "Clothe::create :Success\n");
                }
            }
        }
    }
}
