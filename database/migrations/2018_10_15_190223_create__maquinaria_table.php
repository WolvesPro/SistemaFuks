<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaquinariaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_maquinaria', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_ma');
            $table->string('Nombre_ma');
            $table->integer('Unidades');
            $table->string('Descripción');

            $table->integer('id_alerta')->unsigned();
            $table->foreign('id_alerta')->references('id_alerta')->on('alertas');
            

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
        Schema::dropIfExists('_maquinaria');
    }
}
