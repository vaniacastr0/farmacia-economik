<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('productos')->insert([
            ['nombre_producto' => 'Paracetamol', 'stock_producto' => 159, 'id_categoria' => '1'],
            ['nombre_producto' => 'Omeprazol', 'stock_producto' => 239, 'id_categoria' => '2'],
            ['nombre_producto' => 'Citalopram', 'stock_producto' => 321, 'id_categoria' => '3'],
        ]);
    }
}
