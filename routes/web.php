<?php

use App\Http\Controllers\configuracionController;
use App\Http\Controllers\indexController;use App\Http\Controllers\inicioSesionController;
use App\Http\Controllers\matrizPermisosController;
use App\Http\Controllers\olvideContraController;
use App\Http\Controllers\perfilController;
use App\Http\Controllers\principalController;
use App\Http\Controllers\registrarController;
use App\Http\Controllers\seguidoresController;
use App\Http\Controllers\seguimientoController;
use Illuminate\Support\Facades\Route;

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
Route::get('/cerrando-sesion', [principalController::class, 'cerrarSesion'])->name('mainLogout');

Route::get('/', [indexController::class, 'index'])->name('index');

Route::get('/iniciar-sesion', [inicioSesionController::class, 'index'])->name('login');
Route::post('/iniciar-sesion', [inicioSesionController::class, 'autentificar'])->name('login.auth');

Route::get('/principal', [principalController::class, 'index'])->name(('main'));


Route::get('/configuracion', [configuracionController::class, 'index'])->name(('config'));
Route::post('/configuracion', [configuracionController::class, 'cambiarInfo'])->name(('config.infoP'));
Route::get('/configuracion-2', [configuracionController::class, 'cambiarPrivacidad'])->name(('config.privacidad'));
Route::post('/configuracion-2', [configuracionController::class, 'cambiarContra'])->name(('config.cC'));

Route::get('/olvide-mi-contraseña', [olvideContraController::class, 'index'])->name(('olvideC'));

Route::get('/perfil', [perfilController::class, 'index'])->name(('perfil'));

Route::get('/registrar', [registrarController::class, 'index'])->name(('reg'));
Route::post('/registrar', [registrarController::class, 'registrar'])->name(('reg.proceso'));

Route::get('/Empresas', [seguimientoController::class, 'index'])->name('seguimiento');
Route::get('/dejar-seguir', [seguimientoController::class, 'dejarSeguirEmpresa'])->name('mainUnFollow');
Route::get('/seguir', [seguimientoController::class, 'seguirEmpresa'])->name('mainFollow');

Route::get('/seguidores', [seguidoresController::class, 'index'])->name(('seguidores'));

Route::get('configuracion/matriz-permisos', [matrizPermisosController::class, 'index'])->name('permisos');