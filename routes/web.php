<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Paginas_principal\PaginasPrincipalController;
/*--------------------------------------------------------------------------------------------------------------------*/
use App\Http\Controllers\Administrador\AdministradoresController;
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


/*--------------------------------------------------Indexes-----------------------------------------------------------*/
Route::get('administrador/index', [PaginasPrincipalController::class,'indexInfoGeneralAdministrador'])->name('administrador.index')->middleware('auth');
/*--------------------------------------------------------------------------------------------------------------------*/
/*---------------------------------------Ruta index Administrador-----------------------------------------------------*/
Route::get('administrador/post', [PaginasPrincipalController::class,'lista_post'])->name('administrador.lista.post')->middleware('auth');
Route::get('administrador/post/crear', [PaginasPrincipalController::class,'crear_post'])->name('administrador.crear.post')->middleware('auth');
Route::post('administrador/post', [PaginasPrincipalController::class,'guardar_post'])->name('administrador.guardar.post')->middleware('auth');
Route::get('administrador/post/{id}/editar', [PaginasPrincipalController::class,'editar_post'])->name('administrador.editar.post')->middleware('auth');
Route::put('administrador/post/{id}', [PaginasPrincipalController::class,'actualizar_post'])->name('administrador.actualizar.post')->middleware('auth');
Route::get('administrador/post/{id}', [PaginasPrincipalController::class,'vista_post'])->name('administrador.ver.post')->middleware('auth');
Route::delete('administrador/post/{id}', [PaginasPrincipalController::class,'eliminar_post'])->name('administrador.elimianr.post')->middleware('auth');
/*--------------------------------------------------------------------------------------------------------------------*/

Route::resource('administrador/admin', AdministradoresController::class)->middleware('auth');
Route::resource('administrador/doctor', DoctorAdminController::class)->middleware('auth');
Route::resource('administrador/secretaria', SecretariaAdminController::class)->middleware('auth');
Route::resource('administrador/paciente', PacienteAdminController::class)->middleware('auth');
/*--------------------------------------------------------------------------------------------------------------------*/
Route::get('Secretaria/doctor', [DoctorSecretariaController::class, 'index'])->name('secretaria.doctor.index')->middleware('auth');
Route::get('Secretaria/doctor/crear', [DoctorSecretariaController::class, 'create'])->name('secretaria.doctor.create')->middleware('auth');
Route::post('Secretaria/doctor', [DoctorSecretariaController::class, 'store'])->name('secretaria.doctor.store')->middleware('auth');
Route::get('Secretaria/doctor/{id}/editar', [DoctorSecretariaController::class, 'edit'])->name('secretaria.doctor.edit')->middleware('auth');
Route::put('Secretaria/doctor/{id}', [DoctorSecretariaController::class, 'update'])->name('secretaria.doctor.update')->middleware('auth');
/*--------------------------------------------------------------------------------------------------------------------*/
Route::get('secretaria/paciente', [PacienteSecretariaController::class, 'index'])->name('secretaria.paciente.index')->middleware('auth');
Route::get('secretaria/paciente/crear', [PacienteSecretariaController::class, 'create'])->name('secretaria.paciente.create')->middleware('auth');
Route::post('secretaria/paciente', [PacienteSecretariaController::class, 'store'])->name('secretaria.paciente.store')->middleware('auth');
Route::get('secretaria/paciente/{id}/editar', [PacienteSecretariaController::class, 'edit'])->name('secretaria.paciente.edit')->middleware('auth');
Route::put('secretaria/paciente/{id}', [PacienteSecretariaController::class, 'update'])->name('secretaria.paciente.update')->middleware('auth');
/*--------------------------------------------------------------------------------------------------------------------*/
