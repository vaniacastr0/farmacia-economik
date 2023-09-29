<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BodeguerosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bodegueros')->insert([
            ['rut' => '23456654-3', 'nombre' => 'Juan', 'apellido' => 'Castillo', 'tipo_usuario' => '1'],
            ['rut' => '22645432-5', 'nombre' => 'Catalina', 'apellido' => 'Perez','tipo_usuario' => '1'],
        ]);
    }
}
