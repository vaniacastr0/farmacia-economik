<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Ajuste;
use App\Models\DetalleProducto;

class BodegueroController extends Controller
{
    public function inicio(){
        return view('inicio.bodeguero');
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

    public function actualizar_productos(){
        return view('bodeguero.actualizar');
    }

    public function eliminar_productos(){
        $productos = Producto::with('Categoria')->get();
        return view('bodeguero.eliminar_producto',compact('productos'));
    }

    public function eliminar($id){
        $producto = Producto::find($id);
        return view('bodeguero.eliminar',compact('producto'));
    }

    public function crear_ajuste(Request $request,$id){
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
        return view('bodeguero.eliminar_producto',compact('productos'));
    }
    
    public function listado_ajustes(){
        $productos = Producto::all();
        $ajustes = Ajuste::with('Producto')->get();
        return view('bodeguero.listado_ajustes',compact(['productos','ajustes']));
    }

    public function filtrar_ajustes(Request $request){
        $producto = Producto::find($request)->first();
        $nombre_producto = $producto->nombre_producto;
        //dd($nombre_producto);
        $ajustes = Ajuste::where('id_producto',$producto->id_producto)->get();
        return view('bodeguero.filtrar_ajustes',compact(['producto','ajustes','nombre_producto']));
    }

    public function agregar_nuevoproducto(){
        $categorias = Categoria::all();
        return view('bodeguero.agregar_nuevoproducto',compact('categorias'));
    }

    public function add_nuevoproducto(Request $request){
        //Guardar nuevo producto en tabla PRODUCTO
        $nuevo_producto = new Producto;
        $nuevo_producto->nombre_producto = $request->input('nombre');
        $nuevo_producto->stock_producto = 0;
        $nuevo_producto->id_categoria = $request->input('categoria');
        $nuevo_producto->save();
        //Obtener el id_producto
        $id_nuevoproducto = $nuevo_producto->id_producto;
        //Agregar nuevo producto a la tabla DETALLE_PRODUCTO
        $nuevo_detalleproducto = new DetalleProducto;
        $nuevo_detalleproducto->id_producto = $id_nuevoproducto;
        $nuevo_detalleproducto->fecha_elab = $request->input('elab');
        $nuevo_detalleproducto->fecha_venc = $request->input('venc');
        $nuevo_detalleproducto->stock = 0;
        $nuevo_detalleproducto->precio = $request->input('precio');
        $nuevo_detalleproducto->save();

        $categorias = Categoria::all();
        return view('bodeguero.agregar_nuevoproducto',compact('categorias'));
    }
}
