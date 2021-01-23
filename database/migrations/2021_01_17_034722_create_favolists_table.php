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
            $table->unsignedInteger('ID')->autoIncrement();
            $table->string('email', 100);
            $table->string('TopFile', 256);
            $table->string('BottomFile', 256);
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
