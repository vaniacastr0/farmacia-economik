<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BodegueroController extends Controller
{
    public function inicio(){
        return view('inicio.bodeguero');
    }

    public function ver_productos(){
        return view('bodeguero.productos');
    }

    public function agregar_productos(){
        return view('bodeguero.agregar');
    }
}
