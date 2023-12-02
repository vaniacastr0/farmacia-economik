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

class BodegueroController extends Controller
{
    //INICIO LOGIN
    public function inicio(){
        if(Auth::check()){
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
        if(Auth::check()){
            $numero_filas = Producto::count();
            $stock_actual = Producto::sum('stock_producto');
            $cuentas_activas = Usuario::count();
            $listado_ajustes = Ajuste::count();
            return view('inicio.paginaprincipal',compact(['numero_filas','stock_actual','cuentas_activas','listado_ajustes']));
        }
        return view('login.login');
    }
    //MANTENCION VER PRODUCTOS
    public function mantencion_verproductos(){
        if(Auth::check() && auth()->user()->tipo_usuario === 'B'){
            //Todas las categorias
        $categorias = Categoria::all();
        //todos los productos que tengan categoria
        $productos = Producto::with('Categoria')->get();
        $detalle_producto = DetalleProducto::all();
        return view('bodeguero.mantencion_verproductos', compact(['productos','categorias','detalle_producto']));
        }
        return view('login.login');
    }

    public function mantencion_verproductosfiltrados(Request $request){
        if(Auth::check() && auth()->user()->tipo_usuario === 'B'){
            //buscar categoria que necesito
        $categoria = Categoria::find($request)->first();
        //productos que tengan la categoria que necesito
        $productos = Producto::where('id_categoria',$categoria->id_categoria)->get();
        //guardar el nombre de la categoria 
        $nombre_categoria = $categoria->nombre;
        //guardo los detalles de productos
        $detalle_producto = DetalleProducto::all();
        return view('bodeguero.mantencion_verproductosfiltrados',compact(['categoria','productos','nombre_categoria','detalle_producto']));
        }
        return view('login.login');
    }

    public function mantencion_verproductodetalle($id){
        if(Auth::check() && auth()->user()->tipo_usuario === 'B'){
            $producto = Producto::find($id);
            $detalle_producto = DetalleProducto::where('id_producto','=',$id)->get();
            $ultima_fecha = DetalleProducto::where('id_producto','=',$id)->orderBy('id_detalle_producto','desc')->first();
            $categorias = Categoria::all();
            $productos = Producto::with('Categoria')->get();
            return view('bodeguero.mantencion_verproductodetalle',compact(['producto','detalle_producto','categorias','productos','ultima_fecha']));
        }
        return view('login.login');
    }
    //MANTENCION ACTUALIZAR PRODUCTOS
    public function mantencion_actualizarproductoslistado(){
        if(Auth::check() && auth()->user()->tipo_usuario === 'B'){
            $productos = Producto::all();
        return view('bodeguero.mantencion_actualizarproductoslistado',compact('productos'));
        }
        return view('login.login');
    }

    public function mantencion_actualizarproducto($id){
        if(Auth::check() && auth()->user()->tipo_usuario === 'B'){
            $categorias = Categoria::all();
            $producto = Producto::find($id);
            $detalle_producto = DetalleProducto::find($id);
            return view('bodeguero.mantencion_actualizarproducto',compact(['producto','categorias','detalle_producto']));
        }
        return view('login.login');
    }

    public function mantencion_actualizarproductopost(ActualizacionRequest $request,$id){
        if(Auth::check() && auth()->user()->tipo_usuario === 'B'){
            //FORMATEA EL NOMBRE
            $data = $request->all();
            $data['nombre'] = ucwords(strtolower($data['nombre']));
            //VALIDA
            $data = $request->validated();
            
            $producto = Producto::find($id);

            $producto->nombre_producto = $request->input('nombre');
            $producto->id_categoria = $request->input('categoria');
            $producto->precio_producto = $request->input('precio');

            $producto->save();


            $productos = Producto::all();
            return view('bodeguero.mantencion_actualizarproductoslistado',compact('productos'));
        }
        return view('login.login');
    }

    //MANTENCION AGREGAR PRODUCTO
    public function agregar_nuevoproducto(){
        if(Auth::check() && auth()->user()->tipo_usuario === 'B'){
            $categorias = Categoria::all();
        return view('bodeguero.mantencion_agregarproducto',compact('categorias'));
        }
        return view('login.login');
    }

    public function mantencion_agregarproductopost(IngresoRequest $request){
        if(Auth::check() && auth()->user()->tipo_usuario === 'B'){
             //FORMATEA EL NOMBRE
            $data = $request->all();
            $data['nombre'] = ucwords(strtolower($data['nombre']));
            //VALIDA
            $data = $request->validated();
            //Guardar nuevo producto en tabla PRODUCTO
            $nuevo_producto = new Producto;
            $nuevo_producto->nombre_producto = $request->input('nombre');
            $nuevo_producto->precio_producto = $request->input('precio');
            $nuevo_producto->stock_producto = 0;
            $nuevo_producto->id_categoria = $request->input('categoria');
            $nuevo_producto->save();

            $categorias = Categoria::all();
            return view('bodeguero.mantencion_agregarproducto',compact('categorias'));
        }
        return view('login.login');
    }

    //MANTECION ELIMINAR PRODUCTOS
    public function mantencion_eliminarproductoslistado(){
        if(Auth::check() && auth()->user()->tipo_usuario === 'B'){
            $productos = Producto::all();
            return view('bodeguero.mantencion_eliminarproductoslistado',compact('productos'));
        }
        return view('login.login');
    }

    public function mantencion_eliminarproductodelete($id){
        if(Auth::check() && auth()->user()->tipo_usuario === 'B'){
            $producto = Producto::findOrFail($id);
            $producto->DetalleProducto()->delete();
            $ingreso_producto = IngresoProducto::where('id_producto','=',$id);
            $ingreso_producto->delete();
            $ajuste_producto = Ajuste::where('id_producto','=',$id);
            $ajuste_producto->delete();
            $producto->delete();
            return redirect()->route('bodeguero.mantencion_eliminarproductoslistado')->with('success', 'La cuenta y las imágenes relacionadas se han eliminado correctamente.');
        }
        return view('login.login');
    }

    //AJUSTES LISTADO DE AJUSTES
    public function listado_ajustes(){
        if(Auth::check() && auth()->user()->tipo_usuario === 'B'){
            $productos = Producto::all();
            $ajustes = Ajuste::with('Producto')->get();
            return view('bodeguero.ajustes_listadojustes',compact(['productos','ajustes']));
        }
        return view('login.login');
    }

    public function filtrar_ajustes(Request $request){
        if(Auth::check() && auth()->user()->tipo_usuario === 'B'){
            $producto = Producto::find($request)->first();
            $nombre_producto = $producto->nombre_producto;
            //dd($nombre_producto);
            $ajustes = Ajuste::where('id_producto',$producto->id_producto)->get();
            return view('bodeguero.ajustes_filtrarajustes',compact(['producto','ajustes','nombre_producto']));
        }
        return view('login.login');
    }


    //AJUSTES ELIMINAR CANTIDADES DE MERCADERIA
    public function ajustes_eliminarcantidades(){
        if(Auth::check() && auth()->user()->tipo_usuario === 'B'){
            $productos = Producto::with('Categoria')->get();
            return view('bodeguero.ajustes_eliminarcantidades',compact('productos'));
        }
        return view('login.login');
    }

    public function ajustes_eliminarcantidadesproducto($id){
        if(Auth::check() && auth()->user()->tipo_usuario === 'B'){
            $producto = Producto::find($id);
        return view('bodeguero.ajustes_eliminarcantidadesproducto',compact('producto'));
        }
        return view('login.login');
    }

    public function ajuste_crearajuste(Request $request,$id){
        if(Auth::check() && auth()->user()->tipo_usuario === 'B'){
        //Crear tabla ajuste
            $ajuste = new Ajuste();
            $ajuste->id_producto = $id;
            $ajuste->cantidad = $request->input('ajuste');
            $ajuste->motivo = $request->input('motivo');
            $ajuste->save();
            //actualizar el stock de la tabla productos
            $producto = Producto::find($id);
            $nuevo_stock = ($producto->stock_producto - $request->input('ajuste'));
            $producto->stock_producto = $nuevo_stock;
            $producto->save();

            $productos = Producto::with('Categoria')->get();
            return view('bodeguero.ajustes_eliminarcantidades',compact('productos'));
        }
        return view('login.login');
    }

    //INGRESO DE CANTIDADES DE PRODUCTOS
    public function ingreso_agregarcantidades(){
        if(Auth::check() && auth()->user()->tipo_usuario === 'B'){
            $productos = Producto::all();
            return view('bodeguero.ingreso_agregarcantidades',compact('productos'));
        }
        return view('login.login');
    }

    //INGRESO DE NUEVA MARCADERIA
    public function ingreso_agregarcantidadespost(Request $request){
        if(Auth::check() && auth()->user()->tipo_usuario === 'B'){
            //guardo el producto para ir a la tabla "productos" a sumar su stock
            $producto = Producto::find($request->producto);
            $producto->stock_producto += $request->input('cantidad');
            $producto->save();
            //creo la tabla "detalle_producto" de dicho id_producto
            $nuevodetalle_producto = new DetalleProducto();
            $nuevodetalle_producto->id_producto = $producto->id_producto;
            $nuevodetalle_producto->fecha_elab = $request->input('elab');
            $nuevodetalle_producto->fecha_venc = $request->input('venc');
            $nuevodetalle_producto->stock = $request->input('cantidad');
            $nuevodetalle_producto->save();
            //creo la tabla de "ingreso_producto" para dejar el registro del ingreso
            $nuevoingreso_producto = new IngresoProducto();
            $nuevoingreso_producto->cantidad = $request->input('cantidad');
            $nuevoingreso_producto->id_producto = $producto->id_producto;
            $rut_usuario =(auth()->user()->rut);
            $nuevoingreso_producto->rut_usuario = $rut_usuario;
            $nuevoingreso_producto->save();

            $productos = Producto::all();
            return view('bodeguero.ingreso_agregarcantidades',compact('productos'));
        }
        return view('login.login');
    }

    public function ingreso_listadoingresos(){
        if(Auth::check() && auth()->user()->tipo_usuario === 'B'){
            $productos = Producto::all();
            $ingresos = IngresoProducto::with('Producto','Usuario')->get();
            return view('bodeguero.ingreso_listadoingresos',compact(['ingresos','productos']));
        }
        return view('login.login');
    }
}
