<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;

class BodegueroController extends Controller
{
    public function inicio(){
        return view('inicio.bodeguero');
    }

    public function ver_productos(){
        $categorias = Categoria::all();
        $productos = Producto::all();
        return view('bodeguero.productos', compact(['productos','categorias']));
    }

    public function agregar_productos(){
        return view('bodeguero.agregar');
    }

    public function filtrar_productos(Request $request){
        $categoria = Categoria::find($request)->first();
        $productos = Producto::where('id_categoria',$categoria->id_categoria)->get();
        //dd($productos);
        return view('bodeguero.productos_filtrados',compact(['categoria','productos']));
    }

}
