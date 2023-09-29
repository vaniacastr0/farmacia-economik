<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clientes')->insert([
            ['rut' => '7432345-3', 'nombre' => 'Matias', 'apellido' => 'Castillo'],
            ['rut' => '10534645-3', 'nombre' => 'Monica', 'apellido' => 'Perez'],
        ]);
    }
}
