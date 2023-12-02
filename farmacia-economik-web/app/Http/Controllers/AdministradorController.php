<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateRequest;
use App\Models\Usuario;
use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;

class AdministradorController extends Controller
{
    public function listar_cuentas()
    {
        if (auth()->check() && auth()) {
            $cuentas = Usuario::all();
            return view('administrador.cuentas_ver', compact('cuentas'));
        } else {
            return redirect('/login');
        }
    }

    public function borrar_cuenta(Usuario $cuenta){
        if ($cuenta->tipo_usuario == 'A') {
            return redirect()->route('administrador.cuentas')->with('error', 'No se puede eliminar al administrador');
        }
        $cuenta->delete();
        return redirect()->route('administrador.cuentas_ver');
    }

    public function editar_cuenta($rut){
        $activeAdmi = Usuario::where('tipo_usuario','A')->exists();
        $usuario = Usuario::find($rut);
        return view('administrador.cuenta_editar', compact('usuario','activeAdmi'));
    }

    public function actualizar_cuenta(UpdateRequest $request, $rut){
    $activeAdmi = Usuario::where('tipo_usuario','A')->exists();
    $usuario = Usuario::find($rut);
    $usuario->nombre = $request->nombre;
    $usuario->apellido = $request->apellido;
    $usuario->tipo_usuario = $request->tipo_usuario;
    $usuario->save();
    return redirect()->route('administrador.cuentas_ver');
    }

    public function listar_categorias(){
        
        $categoriasConCantidad = DB::table('categoria_producto')
            ->leftJoin('productos', 'categoria_producto.id_categoria', '=', 'productos.id_categoria')
            ->select(
                'categoria_producto.id_categoria', 
                'categoria_producto.nombre', 
                DB::raw('COUNT(productos.id_producto) as cantidad_productos')
            )
            ->groupBy('categoria_producto.id_categoria', 'categoria_producto.nombre')
            ->get();

        return view('administrador.categorias_ver', compact(['categoriasConCantidad']));
    }
}

