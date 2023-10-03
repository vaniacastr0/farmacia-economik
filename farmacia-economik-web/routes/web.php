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

Route::get('/inicio',[BodegueroController::class,'inicio'])->name('inicio.bodeguero');
Route::get('/inicio/productos',[BodegueroController::class,'ver_productos'])->name('bodeguero.productos');
Route::get('/inicio/agregar',[BodegueroController::class,'agregar_productos'])->name('bodeguero.agregar');
Route::post('/inicio/filtrar',[BodegueroController::class,'filtrar_productos'])->name('bodeguero.filtrar');

Route::get('/', [LoginController::class, 'show'])->name('login.login');
Route::post('/', [LoginController::class, 'login'])->name('login.post');

Route::get('/register', [RegisterController::class, 'show'])->name('register.show');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');





