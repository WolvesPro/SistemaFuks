<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProveedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedores', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_prov');
            $table->string('nomb_prov');
            $table->string('razon_social');
            $table->string('sector_comercial');
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
        Schema::dropIfExists('proveedores');
    }
}
