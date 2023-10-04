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
        Schema::create('detalle_producto', function (Blueprint $table) {
            $table->id('id_detalle_producto'); 
            $table->date('fecha_elab');
            $table->date('fecha_venc');
            $table->smallInteger('stock');
            $table->unsignedBigInteger('id_producto'); 
            
            // Definir la clave foránea
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
        Schema::dropIfExists('detalle_productos');
    }
};
