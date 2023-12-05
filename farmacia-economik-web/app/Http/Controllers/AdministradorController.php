<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateRequest;
use App\Http\Requests\ActualizarClienteRequest;
use App\Http\Requests\AgregarCategoriaRequest;
use App\Models\Usuario;
use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Cliente;
use App\Models\IngresoProducto;
use Illuminate\Support\Facades\DB;

class AdministradorController extends Controller
{
    //USUARIOS
    public function listar_cuentas()
    {
        if (auth()->check() && auth()) {
            $cuentas_ingresosyventas = DB::table('usuarios')
            ->leftJoin('ingreso_productos', 'usuarios.rut', '=', 'ingreso_productos.rut_usuario')
            ->leftJoin('ventas', 'usuarios.rut', '=', 'ventas.rut_usuario')
            ->select(
                'usuarios.rut',
                'usuarios.nombre',
                'usuarios.apellido',
                'usuarios.password',
                'usuarios.tipo_usuario',
                DB::raw('COUNT(ingreso_productos.rut_usuario) as cantidad_ingresos'),
                DB::raw('COUNT(ventas.rut_usuario) as cantidad_ventas') 
            )
            ->groupBy('usuarios.rut', 'usuarios.nombre', 'usuarios.apellido', 'usuarios.password', 'usuarios.tipo_usuario')
            ->get();
            return view('administrador.cuentas_ver', compact('cuentas_ingresosyventas'));
        } else {
            return redirect('/login');
        }
    }

    //BORRAR USUARIOS
    public function borrar_cuenta($cuenta){
        $cuenta = Usuario::findOrFail($cuenta);
        $cuenta->delete();
        return redirect()->route('administrador.cuentas_ver');
    }

    //EDITAR USUARIOS
    public function editar_cuenta($rut){
        $activeAdmi = Usuario::where('tipo_usuario','A')->exists();
        $usuario = Usuario::find($rut);
        return view('administrador.cuenta_editar', compact('usuario','activeAdmi'));
    }

    //ACTUALIZAR USUARIOS
    public function actualizar_cuenta(UpdateRequest $request, $rut){
    $activeAdmi = Usuario::where('tipo_usuario','A')->exists();
    $usuario = Usuario::find($rut);
    $usuario->nombre = $request->nombre;
    $usuario->apellido = $request->apellido;
    $usuario->tipo_usuario = $request->tipo_usuario;
    $usuario->save();
    return redirect()->route('administrador.cuentas_ver');
    }

    //CATEGORIAS
    public function listar_categorias(){
        $categoriasConCantidad = DB::table('categoria_producto')
        ->leftJoin('productos', 'categoria_producto.id_categoria', '=', 'productos.id_categoria')
        ->select(
            'categoria_producto.id_categoria', 
            'categoria_producto.nombre', 
            DB::raw('COUNT(productos.id_producto) as cantidad_productos')
        )
        ->groupBy('categoria_producto.id_categoria', 'categoria_producto.nombre')
        ->orderBy('categoria_producto.nombre', 'asc')  
        ->get();

        return view('administrador.categorias_ver', compact(['categoriasConCantidad']));
    }

    //AGREGAR CATEGORIAS
    public function categorias_agregar(){
        return view('administrador.categorias_agregar');
    }

    public function agregar_producto(AgregarCategoriaRequest $request){
        $nueva_categoria = new Categoria();
        $nueva_categoria->nombre = $request->input('nombre');
        $nueva_categoria->save();

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

    //BORRAR CATEGORIAS
    public function categoria_borrar($id){
        $categoria_borrar = Categoria::findOrFail($id);
        $categoria_borrar->delete();

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

    //CLIENTES
    public function clientes_ver(){
        $clientesConCompras = DB::table('clientes')
        ->leftJoin('ventas', 'clientes.rut', '=', 'ventas.rut_cliente')
        ->select(
            'clientes.rut',
            'clientes.nombre',
            'clientes.apellido',
            DB::raw('COUNT(ventas.rut_cliente) as cantidad_compras')
        )
        ->groupBy('clientes.rut', 'clientes.nombre', 'clientes.apellido')
        ->get();
        return view('administrador.clientes_ver', compact('clientesConCompras'));
    }

    //AGREGAR CLIENTE
    public function clientes_agregar(){
        return view('administrador.clientes_agregar');
    }

    //BORRAR CLIENTE
    public function clientes_borrar($rut){
        $cliente = Cliente::findOrFail($rut);
        $cliente->delete();

        $clientesConCompras = DB::table('clientes')
        ->leftJoin('ventas', 'clientes.rut', '=', 'ventas.rut_cliente')
        ->select(
            'clientes.rut',
            'clientes.nombre',
            'clientes.apellido',
            DB::raw('COUNT(ventas.rut_cliente) as cantidad_compras')
        )
        ->groupBy('clientes.rut', 'clientes.nombre', 'clientes.apellido')
        ->get();
        return view('administrador.clientes_ver', compact('clientesConCompras'));
    }

    //ACTUALIZAR CLIENTE
    public function clientes_editar($rut){
        $cliente = Cliente::findOrFail($rut);
        return view('administrador.clientes_editar', compact('cliente'));
    }

    public function cliente_actualizar(ActualizarClienteRequest $request, $rut){
        $cliente = Cliente::findOrFail($rut);
        $cliente->nombre = $request->nombre;
        $cliente->apellido = $request->apellido;
        $cliente->save();

        $clientesConCompras = DB::table('clientes')
        ->leftJoin('ventas', 'clientes.rut', '=', 'ventas.rut_cliente')
        ->select(
            'clientes.rut',
            'clientes.nombre',
            'clientes.apellido',
            DB::raw('COUNT(ventas.rut_cliente) as cantidad_compras')
        )
        ->groupBy('clientes.rut', 'clientes.nombre', 'clientes.apellido')
        ->get();

        return redirect()->route('administrador.clientes_ver',compact('clientesConCompras'));
        }
}

