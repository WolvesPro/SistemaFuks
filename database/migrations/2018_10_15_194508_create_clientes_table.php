<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id_cliente');
            $table->string('imagen');
            $table->string('nomb_cliente');
            $table->string('colonia');
            $table->string('calle');
            $table->integer('numero_ext');
            $table->integer('telefono');
            $table->string('email');

            $table->integer('id_est')->unsigned();
            $table->foreign('id_est')->references('id_est')->on('estados');

            $table->integer('id_municipio')->unsigned();
            $table->foreign('id_municipio')->references('id_municipio')->on('municipios');

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
        Schema::dropIfExists('clientes');
    }
}
