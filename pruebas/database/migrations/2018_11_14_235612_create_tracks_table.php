<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTracksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tracks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('bpm');
            $table->string('key');
            $table->time('duration');
            $table->float('price');
            $table->integer('genre_id')->unsigned();
            $table->foreign('genre_id')->references('id')->on('genres');
            $table->string('release');
            $table->integer('artist_id')->unsigned();
            $table->foreign('artist_id')->references('id')->on('artists');
           
            //$table->foreing('release')->references('title')->on('releases');
            $table->timestamps();
        });

        /*
        Schema::table('tracks', function($table) {
            $table->foreign('genre_id')->references('id')->on('genres');
        });*/
    }

   
    
    //2017_11_14_235612_create_tracks_table
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tracks');
    }
}
