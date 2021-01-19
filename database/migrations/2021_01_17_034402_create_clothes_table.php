<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class CreateClothesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clothes', function (Blueprint $table) {
            $table->string('ImageFile', 256);
            $table->string('email', 100);
            $table->enum('WearType',['Top', 'Bottom']);
            $table->timestamps();
        });
       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('favolists');
        foreach(glob(storage_path("app/storage"),GLOB_ONLYDIR ) as $dirname){
            Log::debug('dirname : '.$dirname); 
            $this->remove_directory($dirname);
        }
        Schema::dropIfExists('clothes');
        
    }

    // 再帰的にディレクトリを削除する関数
function remove_directory($dir) {
    $files = array_diff(scandir($dir), array('.','..'));
    foreach ($files as $file) {
        // ファイルかディレクトリによって処理を分ける
        if (is_dir("$dir/$file")) {
            // ディレクトリなら再度同じ関数を呼び出す
            $this->remove_directory("$dir/$file");
        } else {
            // ファイルなら削除
            unlink("$dir/$file");
            echo "ファイル:" . $dir . "/" . $file . "を削除n";
        }
    }
    // 指定したディレクトリを削除
    echo "ディレクトリ:" . $dir . "を削除n";
    return rmdir($dir);
}

}
