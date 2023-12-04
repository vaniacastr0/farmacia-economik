<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BodegueroController;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\VendedorController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//INICIO LOGIN
Route::get('/',[UsuariosController::class,'login'])->name('login.login');
Route::get('/inicio',[BodegueroController::class,'inicio'])->name('inicio.bodeguero');
//login
Route::get('/', [LoginController::class, 'show'])->name('login.login');
Route::post('/', [LoginController::class, 'login'])->name('login.post');
//register
Route::get('/register', [RegisterController::class, 'show'])->name('register.show');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');
//logout
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
//PAGINA PRINCIPAL
Route::get('inicio/principal',[BodegueroController::class,'paginaprincipal'])->name('inicio.paginaprincipal');
//------------MANTENCION DE LA TABLA PRODUCTO-------------
//VER PRODUCTOS
Route::get('/inicio/ver/productos',[BodegueroController::class,'mantencion_verproductos'])->name('bodeguero.mantencion_verproductos');
Route::post('/inicio/filtrar/producto',[BodegueroController::class,'mantencion_verproductosfiltrados'])->name('bodeguero.mantencion_verproductosfiltrados');
Route::get('inicio/ver/{id}/producto',[BodegueroController::class,'mantencion_verproductodetalle'])->name('bodeguero.mantencion_verproductodetalle');
//AGREGAR PRODUCTOS
Route::get('/inicio/agregar/producto',[BodegueroController::class,'agregar_nuevoproducto'])->name('bodeguero.mantencion_agregarproducto');
Route::post('inicio/agregar/nuevo',[BodegueroController::class,'mantencion_agregarproductopost'])->name('bodeguero.mantencion_agregarproductopost');
//ELIMINAR PRODUCTOS
Route::get('/inicio/actualizar',[BodegueroController::class,'mantencion_actualizarproductoslistado'])->name('bodeguero.mantencion_actualizarproductoslistado');
Route::get('/inicio/actualizar/{id_producto}',[BodegueroController::class,'mantencion_actualizarproducto'])->name('bodeguero.mantencion_actualizarproducto');
Route::post('/inicio/actualizar/{id_producto}',[BodegueroController::class,'mantencion_actualizarproductopost'])->name('bodeguero.mantencion_actualizarproductopost');
//ACTUALIZAR PRODUCTOS
Route::get('inicio/eliminar/productos',[BodegueroController::class, 'mantencion_eliminarproductoslistado'])->name('bodeguero.mantencion_eliminarproductoslistado');
Route::delete('inicio/eliminar/producto/{id}',[BodegueroController::class,'mantencion_eliminarproductodelete'])-> name('bodegueros.mantencion_eliminarproductodelete');

//----------AJUSTES DE PRODUCTOS(ELIMINAR X ROBO O MERMA)---------
//AGREGAR AJUSTE(ELIMINAR MERCADERIA)
Route::get('/inicio/eliminarmercaderia/productos',[BodegueroController::class,'ajustes_eliminarcantidades'])->name('bodeguero.ajustes_eliminarcantidades');
Route::get('/inicio/eliminarmercaderia/{id_producto}',[BodegueroController::class,'ajustes_eliminarcantidadesproducto'])->name('bodeguero.ajustes_eliminarcantidadesproducto');
Route::post('/inicio/eliminar/producto{id_producto}',[BodegueroController::class,'ajuste_crearajuste'])->name('bodeguero.ajuste_crearajuste');
Route::get('/inicio/listado',[BodegueroController::class,'listado_ajustes'])->name('bodeguero.ajustes_listadojustes');
//LISTAR AJUSTES
Route::post('/inicio/filtrar/listado',[BodegueroController::class,'filtrar_ajustes'])->name('bodeguero.ajustes_filtrarajustes');

//-----------INGRESO DE PRODUCTOS(MERCADERIA NUEVA)--------------
//LISTADO DE INGRESOS
Route::get('/inicio/ajustes',[BodegueroController::class,'ingreso_listadoingresos'])->name('bodeguero.ingreso_listadoingresos');
//INGRESO DE PRODUCTOS
Route::get('/inicio/agregarmercaderia',[BodegueroController::class,'ingreso_agregarcantidades'])->name('bodeguero.ingreso_agregarcantidades');
Route::post('/inicio/agregarmercaderia',[BodegueroController::class,'ingreso_agregarcantidadespost'])->name('bodeguero.ingreso_agregarcantidadespost');

//---------ADMINISTRACION DE CUENTAS-------------------------
//LISTAR CUENTAS
Route::get('/inicio/cuentas',[AdministradorController::class,'listar_cuentas'])->name('administrador.cuentas_ver');
//BORRAR CUENTA
Route::delete('/cuentas/{cuenta}',[AdministradorController::class,'borrar_cuenta'])->name('administrador.borrar_cuenta');
//EDITAR CUENTA
Route::get('/cuentas/editar/{rut}',[AdministradorController::class,'editar_cuenta'])->name('administrador.cuenta_editar');
//ACTUALIZAR CUENTA
Route::put('/cuentas/actualizar/{rut}',[AdministradorController::class,'actualizar_cuenta'])->name('administrador.actualizar_cuenta');

//---------ADMINISTRACION DE CATEGORIAS-------------------------
//LISTADO DE CATEGORIAS
Route::get('/inicio/categorias',[AdministradorController::class,'listar_categorias'])->name('administrador.categorias_ver');
//BORRAR CATEGORIAS
Route::delete('/categorias/{id}',[AdministradorController::class,'categoria_borrar'])->name('administrador.categoria_borrar');

//---------ADMINISTRACION DE CLIENTES-------------------------
//LISTADO DE CLIENTES
Route::get('/inicio/clientes',[AdministradorController::class,'clientes_ver'])->name('administrador.clientes_ver');
//AGREGAR CLIENTE
Route::get('/inicio/agregar',[AdministradorController::class,'clientes_agregar'])->name('administrador.clientes_agregar');
Route::put('/inicio/agregar',[ClientesController::class,'clientes_agregar_post'])->name('administrador.clientes_agregar_post');
//BORRAR CLIENTE
Route::delete('/inicio/eliminar/{id}',[AdministradorController::class,'clientes_borrar'])->name('administrador.clientes_borrar');
//ACTUALIZAR CLIENTE
Route::get('/clientes/editar/{rut}',[AdministradorController::class,'clientes_editar'])->name('administrador.clientes_editar');
Route::put('/clientes/editar/{rut}',[AdministradorController::class,'cliente_actualizar'])->name('administrador.cliente_actualizar');

//---------VENDEDOR-------------------------
//LISTADO DE VENTAS
Route::get('/inicio/ventas',[VendedorController::class,'ventas_ver'])->name('vendedor.ventas_ver');
//AGREGAR VENTA
Route::get('/inicio/venta/agregar',[VendedorController::class,'ventas_agregar'])->name('vendedor.ventar_agregar');
//FIlTRAR
Route::get('/filtrar/categorias', [VendedorController::class,'filtrar_categorias'])->name('vendedor.filtrar_categorias');
//AGREGAR 
Route::post('/venta/producto', [VendedorController::class,'agregar_producto'])->name('vendedor.agregar_producto');

Route::get('/imprimir-boleta/{idVenta}', [VendedorController::class,'imprimir_boleta'])->name('imprimir_boleta');










