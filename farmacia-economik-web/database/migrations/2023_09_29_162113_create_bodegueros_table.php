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
        Schema::create('bodegueros', function (Blueprint $table) {
            //CAMPOS
            $table->string('rut',10)->primary();
            $table->string('nombre',20);
            $table->string('apellido',20);
            //FK
            $table->string('tipo_usuario',1);
            $table->foreign('tipo_usuario')->references('tipo')->on('usuarios');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bodeguero');
    }
};
