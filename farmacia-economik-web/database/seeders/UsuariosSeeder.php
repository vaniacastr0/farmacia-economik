<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
            ['tipo' => '1', 'rut' => '23456654-3', 'pass' => '123'],
            ['tipo' => '2', 'rut' => '22645432-5', 'pass' => '456'],
        ]);
    }
}
