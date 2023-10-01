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
        Schema::create('ingresos_productos', function (Blueprint $table) {
            $table->unsignedBigInteger('id_ingreso'); 
            $table->unsignedBigInteger('id_producto'); // Clave externa a productos
            // Definición de la clave primaria compuesta
            $table->primary(['id_ingreso', 'id_producto']);
        
            $table->integer('cantidad');
            $table->string('rut_bodeguero', 10); // Clave externa a bodegueros
        
            // Definición de la clave externa a productos
            $table->foreign('id_producto')->references('id_producto')->on('productos');

            // Definición de la clave externa a bodegueros
            $table->foreign('rut_bodeguero')->references('rut')->on('bodegueros');
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
