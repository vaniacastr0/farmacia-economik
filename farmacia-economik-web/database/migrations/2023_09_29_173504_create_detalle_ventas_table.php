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
        Schema::create('detalle_ventas', function (Blueprint $table) {
            // Crear la clave compuesta
            $table->unsignedBigInteger('id_venta');
            $table->unsignedBigInteger('id_producto');
            $table->primary(['id_venta', 'id_producto']);
        
            // Crear los demás campos de la tabla de intersección
            $table->integer('precio');
            $table->smallInteger('cantidad');
            $table->integer('total');

        
            // Referenciar a ventas y productos
            $table->foreign('id_venta')->references('id_venta')->on('ventas');
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
        Schema::dropIfExists('detalle_ventas');
    }
};
