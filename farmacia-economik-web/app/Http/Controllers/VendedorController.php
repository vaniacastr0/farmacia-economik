<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Ajuste;
use App\Models\DetalleProducto;
use App\Models\Usuario;
use App\Models\IngresoProducto;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\IngresoRequest;
use App\Http\Requests\ActualizacionRequest;

class VendedorController extends Controller
{
    //INICIO LOGIN
    public function inicio(){
        if(Auth::check() && auth()->user()->tipo_usuario === 'V'){
            $numero_filas = Producto::count();
            $stock_actual = Producto::sum('stock_producto');
            $cuentas_activas = Usuario::count();
            $listado_ajustes = Ajuste::count();
            return view('inicio.paginaprincipal',compact(['numero_filas','stock_actual','cuentas_activas','listado_ajustes']));
        }
        return view('login.login');
        
    }
    //PAGINA PRINCIPAL
    public function paginaprincipal(){
        if(Auth::check() && auth()->user()->tipo_usuario === 'V'){
            $numero_filas = Producto::count();
            $stock_actual = Producto::sum('stock_producto');
            $cuentas_activas = Usuario::count();
            $listado_ajustes = Ajuste::count();
            return view('inicio.paginaprincipal',compact(['numero_filas','stock_actual','cuentas_activas','listado_ajustes']));
        }
        return view('login.login');
    }
}
