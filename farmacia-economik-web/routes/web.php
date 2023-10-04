<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BodegueroController;
use App\Http\Controllers\UsuariosController;
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
//INGRESO DE PRODUCTOS
Route::get('/inicio/agregarmercaderia',[BodegueroController::class,'ingreso_agregarcantidades'])->name('bodeguero.ingreso_agregarcantidades');
Route::post('/inicio/agregarmercaderia',[BodegueroController::class,'ingreso_agregarcantidadespost'])->name('bodeguero.ingreso_agregarcantidadespost');


