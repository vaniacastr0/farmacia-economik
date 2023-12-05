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
use Illuminate\Support\Facades\DB;
use PDF;

class VendedorController extends Controller
{
    //INICIO LOGIN
    public function inicio(){
        if(Auth::check() && auth()->user()->tipo_usuario === 'V'){
            $numero_filas = Producto::count();
            $stock_actual = Producto::sum('stock_producto');
            $cuentas_activas = Usuario::count();
            $listado_ajustes = Ajuste::count();
            $productosStockCritico = Producto::where('stock_producto', '<=', 20)
            ->orderBy('stock_producto', 'asc') // Ordena de menor a mayor stock
            ->get();
            return view('inicio.paginaprincipal',compact(['numero_filas','stock_actual','cuentas_activas','listado_ajustes','productosStockCritico']));
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
            $productosStockCritico = Producto::where('stock_producto', '<=', 20)
            ->orderBy('stock_producto', 'asc') // Ordena de menor a mayor stock
            ->get();
            return view('inicio.paginaprincipal',compact(['numero_filas','stock_actual','cuentas_activas','listado_ajustes','productosStockCritico']));
        }
        return view('login.login');
    }

    public function ventas_ver(){
        $ventas = Venta::all();
        return view('vendedor.ventas_ver',compact('ventas'));
    }

    public function ventas_agregar(){
        $productos_filtrados = Producto::whereIn('id_producto', function ($query) {
            $query->select('id_producto')->from('detalle_producto')
                ->where('stock_producto', '>','0');
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
        // Obtén todos los datos
        $data = $request->all();
        // Accede a los datos específicos
        $datosTabla = json_decode($data['datosTabla'], true);
        $cliente = $data['cliente'];
        $metodoPago = $data['metodoPago'];
        $vendedor = $data['vendedor'];

        // Crea una nueva instancia de Venta
        $venta = new Venta();
        $venta->metodo_pago = $metodoPago;
        $venta->total_venta = 0; // Inicializa el total de la venta
        $venta->rut_usuario = $vendedor;
        $venta->rut_cliente = $cliente;

        // Guarda la venta en la tabla 'venta'
        $venta->save();

         // Obtén el ID de la venta recién creada
        $idVenta = $venta->getKey();
        $venta = Venta::findOrFail($idVenta);

        // Itera sobre los datos de la tabla y guarda en la tabla de intersección 'detalle_venta'
        foreach ($datosTabla as $fila) {
            $producto = Producto::find($fila['id']);

            if ($producto->stock_producto >= $fila['cantidad']) {
                // Agrega el producto a la venta y guarda en 'detalle_venta'
                $venta->ProductosInterseccion()->attach($producto, [
                    'precio' => $fila['precio'],
                    'cantidad' => $fila['cantidad'],
                    'total' => $fila['total'],
                ]);
    
                // Actualiza el total de la venta
                $venta->total_venta += $fila['total'];
    
                // Resta el stock del producto
                $producto->stock_producto -= $fila['cantidad'];
                $producto->save();
            } else {
                // Manejar la situación cuando no hay suficiente stock
                return response()->json(['error' => 'No hay suficiente stock para el producto ' . $producto->nombre_producto], 400);
            }
        }
         // Actualiza la venta con el total final
        $venta->save();

        $detallesVenta = DB::table('detalle_ventas')
        ->select('id_venta', 'id_producto', 'precio', 'cantidad','total')
        ->where('id_venta', $idVenta)
        ->get();

        return view ('vendedor.ventas_ver_detalle', [
            'idVenta' => $idVenta,
            'detallesVenta' => $detallesVenta,
            'venta' => $venta,
        ]);
    }

    public function imprimir_boleta($id){
        $venta = Venta::findOrFail($id);
        $detallesVenta = DB::table('detalle_ventas')
        ->select('id_venta', 'id_producto', 'precio', 'cantidad','total')
        ->where('id_venta', $id)
        ->get();
        $pdf = Pdf::loadView('vendedor.ventas_boleta', compact('venta', 'detallesVenta'));
        return $pdf->stream();
    }


}
