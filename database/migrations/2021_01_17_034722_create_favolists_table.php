<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFavolistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favolists', function (Blueprint $table) {
            $table->string('email', 100);
            $table->string('TopFile', 256)->references('ImageFile')->on('clothes')->onDelete('cascade');
            $table->string('BottomFile', 256)->references('ImageFile')->on('clothes')->onDelete('cascade');
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
    }
}
