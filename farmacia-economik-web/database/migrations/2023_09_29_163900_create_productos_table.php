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
        Schema::create('productos', function (Blueprint $table) {
            //CAMPOS
            $table->id('id_producto');
            $table->string('nombre_producto',30);
            $table->integer('precio_producto');
            $table->smallInteger('stock_producto');
            //FK
            $table->unsignedBigInteger('id_categoria');
            //REFERENCES
            $table->foreign('id_categoria')->references('id_categoria')->on('categoria_producto');
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
};
