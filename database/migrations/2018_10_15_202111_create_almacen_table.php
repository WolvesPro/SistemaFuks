<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlmacenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('almacen', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_almacen');
            $table->string('nomb_almacen');
           

            $table->integer('id_prod')->unsigned();
            $table->foreign('id_prod')->references('id_prod')->on('productos');

            $table->integer('id_area')->unsigned();
            $table->foreign('id_area')->references('id_area')->on('area');
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
        Schema::dropIfExists('almacen');
    }
}
