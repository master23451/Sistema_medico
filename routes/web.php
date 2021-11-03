<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PublicacionController;
use App\Http\Controllers\UserController as Usuario;
use App\Http\Controllers\HomeController as Home;
use App\Http\Controllers\DashboardController;
/*--------------------------------------------------------------------------------------------------------------------*/
use App\Http\Controllers\Administrador\DoctorAdminController;
use App\Http\Controllers\Administrador\SecretariaAdminController;
use App\Http\Controllers\Administrador\PacienteAdminController;
/*--------------------------------------------------------------------------------------------------------------------*/
use App\Http\Controllers\Secretaria\DoctorSecretariaController;
use App\Http\Controllers\Secretaria\PacienteSecretariaController;
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

/*Route::get('/', function () {
    return view('welcome');
});*/

/*Route::middleware(['auth:sanctum', 'verified'])->group(function (){

});*/

Route::group(['middleware' => 'verified'], function(){

    Route::get('home',  [Home::class, 'index'])->name('home');
    Route::get('administardor/dashboard',[DashboardController::class,'dashboardAdmin'])->name('dashboard.admin');
    /*----------------------------------------------------------------------------------------------------------------*/
    Route::get('administrador/usuario', [Usuario::class, 'index'])->name('usuario.index');
    Route::get('administrador/usuario/crear', [Usuario::class, 'create'])->name('usuario.create');
    Route::post('administrador/usuario/guardado', [Usuario::class, 'store'])->name('usuario.store');
    Route::get('administrador/usuario/{id}/editar', [Usuario::class, 'edit'])->name('usuario.edit');
    Route::put('administrador/usuario/{id}/modificado', [Usuario::class, 'update'])->name('usuario.update');
    Route::delete('administrador/usuario/{id}/eliminado', [Usuario::class, 'destroy'])->name('usuario.destroy');
    Route::get('administrador/usuario', [Usuario::class, 'index'])->name('usuario.index');
    /*----------------------------------------------------------------------------------------------------------------*/
    Route::get('usuario/perfil', [Usuario::class, 'editPerfil'])->name('perfil');
    Route::put('usuario/perfil{id}/actualizar', [Usuario::class, 'actualizar_perfil'])->name('usuario.perfil.update');
    Route::delete('usuario/perfil/{id}/eliminar', [Usuario::class, 'eliminar_perfil'])->name('usuario.perfil.destroy');
    /*----------------------------------------------------------------------------------------------------------------*/
    Route::get('administrador/publicaciones', [PublicacionController::class,'index'])->name('publicacion.index');
    Route::get('administrador/publicaciones/crear', [PublicacionController::class,'create'])->name('publicacion.create');
    Route::post('administrador/publicaciones', [PublicacionController::class,'store'])->name('publicacion.store');
    Route::get('administrador/publicaciones/{id}/editar', [PublicacionController::class,'edit'])->name('publicacion.edit');
    Route::put('administrador/publicaciones/{id}/modificar', [PublicacionController::class,'update'])->name('publicacion.update');
    Route::delete('administrador/publicaciones/{id}/eliminado', [PublicacionController::class,'destroy'])->name('publicacion.destroy');
});


/*--------------------------------------------------Indexes-----------------------------------------------------------*/
Route::get('administrador/index', [PaginasPrincipalController::class,'indexInfoGeneralAdministrador'])->name('administrador.index')->middleware('auth');
/*--------------------------------------------------------------------------------------------------------------------*/

/*--------------------------------Rutas de administrador--------------------------------------------------------------*/
Route::group(['middleware' => 'auth'], function (){

    Route::resource('administrador/doctor', DoctorAdminController::class);
    Route::resource('administrador/secretaria', SecretariaAdminController::class);
    Route::resource('administrador/paciente', PacienteAdminController::class);
    /*--------------------------------------------------------------------------------------------------------------------*/

});

/*----------------------------------Rutas de secretaria---------------------------------------------------------------*/
    Route::group(['middleware' => 'auth'], function (){

        Route::get('Secretaria/doctor', [DoctorSecretariaController::class, 'index'])->name('secretaria.doctor.index');
        Route::get('Secretaria/doctor/crear', [DoctorSecretariaController::class, 'create'])->name('secretaria.doctor.create');
        Route::post('Secretaria/doctor', [DoctorSecretariaController::class, 'store'])->name('secretaria.doctor.store');
        Route::get('Secretaria/doctor/{id}/editar', [DoctorSecretariaController::class, 'edit'])->name('secretaria.doctor.edit');
        Route::put('Secretaria/doctor/{id}', [DoctorSecretariaController::class, 'update'])->name('secretaria.doctor.update');
        /*--------------------------------------------------------------------------------------------------------------------*/
        Route::get('secretaria/paciente', [PacienteSecretariaController::class, 'index'])->name('secretaria.paciente.index');
        Route::get('secretaria/paciente/crear', [PacienteSecretariaController::class, 'create'])->name('secretaria.paciente.create');
        Route::post('secretaria/paciente', [PacienteSecretariaController::class, 'store'])->name('secretaria.paciente.store');
        Route::get('secretaria/paciente/{id}/editar', [PacienteSecretariaController::class, 'edit'])->name('secretaria.paciente.edit');
        Route::put('secretaria/paciente/{id}', [PacienteSecretariaController::class, 'update'])->name('secretaria.paciente.update');
        /*--------------------------------------------------------------------------------------------------------------------*/
    });



