<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_emp');
            $table->string('nomb_emp');
            $table->string('ape_paterno');
            $table->string('ape_materno');
            $table->string('colonia');
            $table->string('calle');
            $table->integer('numero_ext');
            $table->string('email');
            $table->string('puesto');

            $table->integer('id_est')->unsigned();
            $table->foreign('id_est')->references('id_est')->on('estados');

            $table->integer('id_municipio')->unsigned();
            $table->foreign('id_municipio')->references('id_municipio')->on('municipios');

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
        Schema::dropIfExists('empleados');
    }
}
