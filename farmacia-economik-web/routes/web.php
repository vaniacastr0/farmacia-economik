<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BodegueroController;
use App\Http\Controllers\UsuariosController;

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
//MANTENCION DE LA TABLA PRODUCTO
Route::get('/inicio/productos',[BodegueroController::class,'mantencion_verproductos'])->name('bodeguero.mantencion_verproductos');
Route::get('/inicio/agregar/producto',[BodegueroController::class,'agregar_nuevoproducto'])->name('bodeguero.mantencion_agregarproducto');
Route::post('inicio/agregar/nuevo',[BodegueroController::class,'mantencion_agregarproductopost'])->name('bodeguero.mantencion_agregarproductopost');
Route::post('/inicio/filtrar',[BodegueroController::class,'mantencion_verproductosfiltrados'])->name('bodeguero.mantencion_verproductosfiltrados');
Route::get('/inicio/actualizar',[BodegueroController::class,'mantencion_actualizarproductoslistado'])->name('bodeguero.mantencion_actualizarproductoslistado');
Route::get('/inicio/actualizar/{id_producto}',[BodegueroController::class,'mantencion_actualizarproducto'])->name('bodeguero.mantencion_actualizarproducto');
Route::post('/inicio/actualizar/{id_producto}',[BodegueroController::class,'mantencion_actualizarproductopost'])->name('bodeguero.mantencion_actualizarproductopost');
//AJUSTES DE PRODUCTOS(ELIMINAR X ROBO O MERMA)
Route::get('/inicio/eliminar/productos',[BodegueroController::class,'ajustes_eliminarcantidades'])->name('bodeguero.ajustes_eliminarcantidades');
Route::get('/inicio/eliminar/{id_producto}',[BodegueroController::class,'ajustes_eliminarcantidadesproducto'])->name('bodeguero.ajustes_eliminarcantidadesproducto');
Route::post('/inicio/eliminar/producto{id_producto}',[BodegueroController::class,'ajuste_crearajuste'])->name('bodeguero.ajuste_crearajuste');
Route::get('/inicio/listado',[BodegueroController::class,'listado_ajustes'])->name('bodeguero.ajustes_listadojustes');
Route::post('/inicio/filtrar/listado',[BodegueroController::class,'filtrar_ajustes'])->name('bodeguero.ajustes_filtrarajustes');
//INGRESO DE PRODUCTOS(MERCADERIA NUEVA)
Route::get('/inicio/agregarmercaderia',[BodegueroController::class,'ingreso_agregarcantidades'])->name('bodeguero.ingreso_agregarcantidades');
Route::post('/inicio/agregarmercaderia',[BodegueroController::class,'ingreso_agregarcantidadespost'])->name('bodeguero.ingreso_agregarcantidadespost');


