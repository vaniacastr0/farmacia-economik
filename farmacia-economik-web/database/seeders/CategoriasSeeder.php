<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categoria_producto')->insert([
            ['nombre' => 'Analgesico'],
            ['nombre' => 'Antiulceroso'],
            ['nombre' => 'Antidepresivo'],
        ]);
    }
}
