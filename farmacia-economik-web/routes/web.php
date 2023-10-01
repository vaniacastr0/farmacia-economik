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
Route::get('/',[UsuariosController::class,'login'])->name('login.login');
Route::get('/inicio',[BodegueroController::class,'inicio'])->name('inicio.bodeguero');

Route::get('/inicio/productos',[BodegueroController::class,'ver_productos'])->name('bodeguero.productos');
Route::get('/inicio/agregar',[BodegueroController::class,'agregar_productos'])->name('bodeguero.agregar');
Route::post('/inicio/filtrar',[BodegueroController::class,'filtrar_productos'])->name('bodeguero.filtrar');
Route::get('/inicio/actualizar',[BodegueroController::class,'actualizar_productos'])->name('bodeguero.actualizar');
Route::get('/inicio/eliminar/productos',[BodegueroController::class,'eliminar_productos'])->name('bodeguero.eliminar_productos');
Route::get('/inicio/eliminar/{id_producto}',[BodegueroController::class,'eliminar'])->name('bodeguero.eliminar');
Route::post('/inicio/eliminar/producto{id_producto}',[BodegueroController::class,'crear_ajuste'])->name('bodeguero.crear_ajuste');
Route::get('/inicio/listado',[BodegueroController::class,'listado_ajustes'])->name('bodeguero.listado_ajustes');
Route::post('/inicio/filtrar/listado',[BodegueroController::class,'filtrar_ajustes'])->name('bodeguero.filtrar_ajustes');

Route::get('/inicio/agregar/producto',[BodegueroController::class,'agregar_nuevoproducto'])->name('bodeguero.agregar_nuevoproducto');
Route::post('inicio/agregar/nuevo',[BodegueroController::class,'add_nuevoproducto'])->name('bodeguero.add_nuevoproducto');


