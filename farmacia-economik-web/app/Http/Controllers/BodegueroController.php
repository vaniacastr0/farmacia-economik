<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Ajuste;
use App\Models\DetalleProducto;

class BodegueroController extends Controller
{
    //INICIO LOGIN
    public function inicio(){
        $numero_filas = Producto::count();
        return view('inicio.paginaprincipal',compact('numero_filas'));
    }
    //MANTENCION VER PRODUCTOS
    public function mantencion_verproductos(){
        //Todas las categorias
        $categorias = Categoria::all();
        //todos los productos que tengan categoria
        $productos = Producto::with('Categoria')->get();
        return view('bodeguero.mantencion_verproductos', compact(['productos','categorias']));
    }

    public function mantencion_verproductosfiltrados(Request $request){
        //buscar categoria que necesito
        $categoria = Categoria::find($request)->first();
        //productos que tengan la categoria que necesito
        $productos = Producto::where('id_categoria',$categoria->id_categoria)->get();
        //guardar el nombre de la categoria 
        $nombre_categoria = $categoria->nombre;
        return view('bodeguero.mantencion_verproductosfiltrados',compact(['categoria','productos','nombre_categoria']));
    }

    public function mantencion_verproductodetalle($id){
        $producto = Producto::find($id);
        $detalle_producto = DetalleProducto::find($id);
        $categorias = Categoria::all();
        $productos = Producto::with('Categoria')->get();
        return view('bodeguero.mantencion_verproductodetalle',compact(['producto','detalle_producto','categorias','productos']));
    }
    //MANTENCION ACTUALIZAR PRODUCTOS
    public function mantencion_actualizarproductoslistado(){
        $productos = Producto::all();
        return view('bodeguero.mantencion_actualizarproductoslistado',compact('productos'));
    }

    public function mantencion_actualizarproducto($id){
        $categorias = Categoria::all();
        $producto = Producto::find($id);
        $detalle_producto = DetalleProducto::find($id);
        return view('bodeguero.mantencion_actualizarproducto',compact(['producto','categorias','detalle_producto']));
    }

    public function mantencion_actualizarproductopost(Request $request,$id){
        $producto = Producto::find($id);
        $detalle_producto = DetalleProducto::find($id);

        $producto->nombre_producto = $request->input('nombre');
        $producto->id_categoria = $request->input('categoria');
        $detalle_producto->fecha_elab = $request->input('elab');
        $detalle_producto->fecha_venc = $request->input('venc');
        $detalle_producto->precio = $request->input('precio');

        $producto->save();
        $detalle_producto->save();

        $productos = Producto::all();
        return view('bodeguero.mantencion_actualizarproductoslistado',compact('productos'));
    }

    //MANTENCION AGREGAR PRODUCTO
    public function agregar_nuevoproducto(){
        $categorias = Categoria::all();
        return view('bodeguero.mantencion_agregarproducto',compact('categorias'));
    }

    public function mantencion_agregarproductopost(Request $request){
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

    //MANTECION ELIMINAR PRODUCTOS
    public function mantencion_eliminarproductoslistado(){
        $productos = Producto::all();
        return view('bodeguero.mantencion_eliminarproductoslistado',compact('productos'));
    }

    public function mantencion_eliminarproductodelete($id){
        $producto = Producto::findOrFail($id);
        $producto->DetalleProducto()->delete();
        $producto->delete();
        return redirect()->route('bodeguero.mantencion_eliminarproductoslistado')->with('success', 'La cuenta y las imágenes relacionadas se han eliminado correctamente.');
    }

    
    //AJUSTES LISTADO DE AJUSTES
    public function listado_ajustes(){
        $productos = Producto::all();
        $ajustes = Ajuste::with('Producto')->get();
        return view('bodeguero.ajustes_listadojustes',compact(['productos','ajustes']));
    }

    public function filtrar_ajustes(Request $request){
        $producto = Producto::find($request)->first();
        $nombre_producto = $producto->nombre_producto;
        //dd($nombre_producto);
        $ajustes = Ajuste::where('id_producto',$producto->id_producto)->get();
        return view('bodeguero.ajustes_filtrarajustes',compact(['producto','ajustes','nombre_producto']));
    }

    //AJUSTES ELIMINAR CANTIDADES DE MERCADERIA
    public function ajustes_eliminarcantidades(){
        $productos = Producto::with('Categoria')->get();
        return view('bodeguero.ajustes_eliminarcantidades',compact('productos'));
    }

    public function ajustes_eliminarcantidadesproducto($id){
        $producto = Producto::find($id);
        return view('bodeguero.ajustes_eliminarcantidadesproducto',compact('producto'));
    }

    public function ajuste_crearajuste(Request $request,$id){
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

    //INGRESO DE CANTIDADES DE PRODUCTOS
    public function ingreso_agregarcantidades(){
        $productos = Producto::all();
        return view('bodeguero.ingreso_agregarcantidades',compact('productos'));
    }

    //INGRESO DE NUEVA MARCADERIA
    public function ingreso_agregarcantidadespost(Request $request){
        $producto = Producto::find($request->producto);
        $producto->stock_producto += $request->input('cantidad');
        $producto->save();

        $nuevodetalle_producto = new DetalleProducto();
        $nuevodetalle_producto->id_producto = $producto->id_producto;
        $nuevodetalle_producto->fecha_elab = $request->input('elab');
        $nuevodetalle_producto->fecha_venc = $request->input('venc');
        $nuevodetalle_producto->stock = $request->input('cantidad');
        $nuevodetalle_producto->save();


        $productos = Producto::all();
        return view('bodeguero.ingreso_agregarcantidades',compact('productos'));
    }
}
