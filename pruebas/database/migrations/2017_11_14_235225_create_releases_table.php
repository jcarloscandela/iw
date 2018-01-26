<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReleasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('releases', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->date('creationDate');
            $table->string('description');
            $table->string('picture');
            $table->string('label');
            //$table->foreign('label')->references('name')->on('discographies');//referencia a discográfica
            // faltaría géneros si hiciera falta, sino
            // lo obtenemos con una consulta sql
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
        Schema::dropIfExists('releases');
    }
}
