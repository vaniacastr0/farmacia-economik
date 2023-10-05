<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingreso_productos', function (Blueprint $table) {
            $table->id('id_ingreso'); 
            $table->date('fecha'); //fecha de creacion de la tabla
            $table->smallInteger('cantidad');
            $table->unsignedBigInteger('id_producto'); 
            $table->string('rut_usuario', 10);

            $table->foreign('id_producto')->references('id_producto')->on('productos');
            $table->foreign('rut_usuario')->references('rut')->on('usuarios');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingresos_productos');
    }
};
