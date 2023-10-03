<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Support\Facades\Auth;

class BodegueroController extends Controller
{
    public function inicio(){
        if(Auth::check()){
            return view('inicio.bodeguero');
        }
        return view('login.login');
        
    }

    public function ver_productos(){
        //Todas las categorias
        $categorias = Categoria::all();
        //todos los productos que tengan categoria
        $productos = Producto::with('Categoria')->get();
        return view('bodeguero.productos', compact(['productos','categorias']));
    }

    public function agregar_productos(){
        return view('bodeguero.agregar');
    }

    public function filtrar_productos(Request $request){
        //buscar categoria que necesito
        $categoria = Categoria::find($request)->first();
        //productos que tengan la categoria que necesito
        $productos = Producto::where('id_categoria',$categoria->id_categoria)->get();
        //guardar el nombre de la categoria 
        $nombre_categoria = $categoria->nombre;
        return view('bodeguero.productos_filtrados',compact(['categoria','productos','nombre_categoria']));
    }

}
