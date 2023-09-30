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
        Schema::create('ventas', function (Blueprint $table) {
            // Clave primaria
            $table->id('id_venta'); // Utiliza esto para definir la clave primaria autoincrementable
            
            // Otros campos
            $table->dateTime('fecha_venta');
            $table->string('metodo_pago', 15);
        
            // Claves foráneas
            $table->string('rut_vendedor', 10);
            $table->string('rut_cliente', 10);
        
            // Restricciones de clave foránea
            $table->foreign('rut_vendedor')->references('rut')->on('vendedores');
            $table->foreign('rut_cliente')->references('rut')->on('clientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventas');
    }
};
