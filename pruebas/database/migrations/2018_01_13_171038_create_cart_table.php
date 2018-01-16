<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $table->increments('id');
        $table->integer('track_id')->unsigned();
        $table->foreign('track_id')->references('id')->on('tracks');
        $table->integer('user_id')->unsigned();
        $table->foreign('user_id')->references('id')->on('users');
       
        //$table->foreing('release')->references('title')->on('releases');
     $table->timestamps();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart');
    }
}
