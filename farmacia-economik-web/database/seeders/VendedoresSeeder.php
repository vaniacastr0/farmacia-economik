<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VendedoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vendedores')->insert([
            ['rut' => '16485657-3', 'nombre' => 'Marcelo', 'apellido' => 'Lopez', 'tipo_usuario' => '2'],
            ['rut' => '18455434-2', 'nombre' => 'Nicolas', 'apellido' => 'Rojas','tipo_usuario' => '2'],
        ]);
    }
}
