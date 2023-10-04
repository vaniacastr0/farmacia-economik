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
            $table->smallInteger('cantidad');
            $table->unsignedBigInteger('id_producto'); 
            $table->string('rut_bodeguero', 10);
            
            $table->foreign('id_producto')->references('id_producto')->on('productos');
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
