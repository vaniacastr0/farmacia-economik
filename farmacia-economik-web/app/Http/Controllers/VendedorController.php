<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Ajuste;
use App\Models\Venta;
use App\Models\Cliente;
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

    public function ventas_ver(){
        $ventas = Venta::all();
        return view('vendedor.ventas_ver',compact('ventas'));
    }

    public function ventas_agregar(){
        $productos_filtrados = Producto::whereIn('id_producto', function ($query) {
            $query->select('id_producto')->from('detalle_producto');
        })->get();

        $clientes = Cliente::all();
        
        return view('vendedor.ventas_agregar',compact(['productos_filtrados','clientes',]));
    }

    public function filtrar_categorias(Request $request){
        $productos_con_stock = Producto::whereIn('id_producto', function ($query) {
            $query->select('id_producto')->from('detalle_producto');
        })->get();
    
        $clientes = Cliente::all();
    
        $buscarpor = $request->input('buscarpor');
    
        $productos_filtrados = Producto::where('nombre_producto', 'like', '%' . $buscarpor . '%')
            ->whereIn('id_producto', $productos_con_stock->pluck('id_producto'))
            ->get();
    
        return view('vendedor.ventas_agregar', compact(['buscarpor', 'clientes', 'productos_con_stock', 'productos_filtrados']));
    }
    
    public function agregar_producto(Request $request) {
        $cliente = $request->input('cliente');
    }
}
