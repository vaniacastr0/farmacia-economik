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

