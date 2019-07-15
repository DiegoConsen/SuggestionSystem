<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSongUserPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        
        Schema::create('song_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('song_id')->references('id')->on('songs')->onDelete('cascade');
            $table->bigInteger('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('level')->default(-1);
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
        Schema::table('song_user', function (Blueprint $table) {
            Schema::dropIfExists('song_user');
        });
    }
}
