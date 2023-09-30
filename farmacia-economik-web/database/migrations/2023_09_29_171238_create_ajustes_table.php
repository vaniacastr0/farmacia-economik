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
        Schema::create('ajustes', function (Blueprint $table) {
            $table->unsignedBigInteger('id_producto'); // Clave externa a la tabla productos
            $table->date('fecha'); // Fecha de creación
            $table->integer('cantidad');
            $table->string('motivo', 255);
            
            // Definición de la clave primaria compuesta
            $table->primary(['id_producto', 'fecha']);

            // Definición de la clave externa a productos
            $table->foreign('id_producto')->references('id_producto')->on('productos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ajustes');
    }
};
