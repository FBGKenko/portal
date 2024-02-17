<?php

use App\Http\Controllers\cambiarContraseñaController;
use App\Http\Controllers\configuracionController;
use App\Http\Controllers\dashboardAdminController;
use App\Http\Controllers\indexController;use App\Http\Controllers\inicioSesionController;
use App\Http\Controllers\listaServiciosController;
use App\Http\Controllers\matrizPermisosController;
use App\Http\Controllers\olvideContraController;
use App\Http\Controllers\perfilController;
use App\Http\Controllers\perfilEmpresaController;
use App\Http\Controllers\principalController;
use App\Http\Controllers\registrarController;
use App\Http\Controllers\seguidoresController;
use App\Http\Controllers\seguimientoController;
use Illuminate\Support\Facades\Route;
use App\Mail\olvideContraseñaMailable;
use Illuminate\Support\Facades\Mail;
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
Route::middleware(['sesion'])->group(function (){
    Route::get('/principal', [principalController::class, 'index'])->name(('main'));

    Route::get('/configuracion', [configuracionController::class, 'index'])->name(('config'));
    Route::post('/configuracion', [configuracionController::class, 'cambiarInfo'])->name(('config.infoP'));
    Route::get('/configuracion-2', [configuracionController::class, 'cambiarPrivacidad'])->name(('config.privacidad'));
    Route::post('/configuracion-2', [configuracionController::class, 'cambiarContra'])->name(('config.cC'));



    Route::get('/perfil', [perfilController::class, 'index'])->name(('perfil'));


    Route::get('/Empresas', [seguimientoController::class, 'index'])->name('seguimiento');
    Route::get('/dejar-seguir', [seguimientoController::class, 'dejarSeguirEmpresa'])->name('mainUnFollow');
    Route::get('/seguir', [seguimientoController::class, 'seguirEmpresa'])->name('mainFollow');

    Route::get('/Empresas/ver-{razon}', [perfilEmpresaController::class, 'index'])->name('verEmpresaPerfil');
    Route::get('/Empresas/cambiandoEstado-{empresa}', [perfilEmpresaController::class, 'cambiarSeguirEmpresa'])->name('cambiarSeguirEmpresa');

    Route::get('/seguidores', [seguidoresController::class, 'index'])->name(('seguidores'));

    Route::get('/servicios', [listaServiciosController::class, 'index'])->name('serviciosCliente');

    Route::get('configuracion/matriz-permisos', [matrizPermisosController::class, 'index'])->name('permisos');
    Route::post('configuracion/matriz-permisos', [matrizPermisosController::class, 'cambiarPermiso'])->name('permisos.change');
    Route::get('configuracion/matriz-permisos/getPermisos', [matrizPermisosController::class, 'obtenerPermisos'])->name('permisos.obtenerPermisos');
    Route::post('configuracion/matriz-permisos/guardarPermiso', [matrizPermisosController::class, 'guardarPermisos'])->name('permisos.guardarPermiso');
});

Route::get('/panel-maestro', [dashboardAdminController::class, 'index'])->name(('panelmaestro.main'));

Route::get('/cerrando-sesion', [principalController::class, 'cerrarSesion'])->name('mainLogout');

Route::get('/', [indexController::class, 'index'])->name('index');

Route::get('/iniciar-sesion', [inicioSesionController::class, 'index'])->name('login');
Route::post('/iniciar-sesion', [inicioSesionController::class, 'autentificar'])->name('login.auth');

Route::get('/olvide-mi-contrasenia', [olvideContraController::class, 'index'])->name(('olvideC'));
Route::post('olvide-mi-contrasenia', [olvideContraController::class, 'enviarCorreo'])->name('enviarCC');

Route::get('/cambiando-contrasenia{token}', [cambiarContraseñaController::class, 'index'])->name('index.ccc');
Route::post('/cambiando-contrasenia{token}', [cambiarContraseñaController::class, 'cambiarContra'])->name('CCC');

Route::get('/registrar', [registrarController::class, 'index'])->name(('reg'));
Route::post('/registrar', [registrarController::class, 'registrar'])->name(('reg.proceso'));

