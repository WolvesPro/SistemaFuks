<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_prod');
            $table->string('nomb_prod');
            $table->string('precio');
            $table->string('existencia');
            $table->string('descripcion');
            
            $table->integer('id_prov')->unsigned();
            $table->foreign('id_prov')->references('id_prov')->on('proveedores');

            $table->integer('id_cliente')->unsigned();
            $table->foreign('id_cliente')->references('id_cliente')->on('clientes');


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
        Schema::dropIfExists('productos');
    }
}
