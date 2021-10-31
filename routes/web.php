<?php

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Paginas_principal\PaginasPrincipalController;
use App\Http\Controllers\UserController as Usuario;
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

Route::middleware(['auth:sanctum', 'verified'])->group(function (){
    Route::get('administrador/usuario', [Usuario::class, 'index'])->name('usuario.index');
    Route::get('administrador/usuario/crear', [Usuario::class, 'create'])->name('usuario.create');
    Route::post('administrador/usuario/guardado', [Usuario::class, 'store'])->name('usuario.store');
    Route::get('administrador/usuario/{id}/editar', [Usuario::class, 'edit'])->name('usuario.edit');
    Route::put('administrador/usuario/{id}/modificado', [Usuario::class, 'update'])->name('usuario.update');
    Route::delete('administrador/usuario/{id}/eliminado', [Usuario::class, 'destroy'])->name('usuario.destroy');
});



Route::group(['middleware' => 'auth'], function (){

    Route::get('administrador/usuario', [Usuario::class, 'index'])->name('usuario.index');
    Route::get('administrador/usuario/crear', [Usuario::class, 'create'])->name('usuario.create');
    Route::post('administrador/usuario/guardado', [Usuario::class, 'store'])->name('usuario.store');
    Route::get('administrador/usuario/{id}/editar', [Usuario::class, 'edit'])->name('usuario.edit');
    Route::put('administrador/usuario/{id}/modificado', [Usuario::class, 'update'])->name('usuario.update');
    Route::delete('administrador/usuario/{id}/eliminado', [Usuario::class, 'destroy'])->name('usuario.destroy');
});

/*--------------------------------------------------Indexes-----------------------------------------------------------*/
Route::get('administrador/index', [PaginasPrincipalController::class,'indexInfoGeneralAdministrador'])->name('administrador.index')->middleware('auth');
/*--------------------------------------------------------------------------------------------------------------------*/

/*---------------------------------------Ruta del mensajes administrador----------------------------------------------*/
Route::group(['middleware' => 'auth'], function(){

    Route::get('administrador/post', [PaginasPrincipalController::class,'lista_post'])->name('administrador.lista.post');
    Route::get('administrador/post/crear', [PaginasPrincipalController::class,'crear_post'])->name('administrador.crear.post');
    Route::post('administrador/post', [PaginasPrincipalController::class,'guardar_post'])->name('administrador.guardar.post');
    Route::get('administrador/post/{id}/editar', [PaginasPrincipalController::class,'editar_post'])->name('administrador.editar.post');
    Route::put('administrador/post/{id}', [PaginasPrincipalController::class,'actualizar_post'])->name('administrador.actualizar.post');
    Route::get('administrador/post/{id}', [PaginasPrincipalController::class,'vista_post'])->name('administrador.ver.post');
    Route::delete('administrador/post/{id}', [PaginasPrincipalController::class,'eliminar_post'])->name('administrador.elimianr.post');
    /*--------------------------------------------------------------------------------------------------------------------*/
});

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





