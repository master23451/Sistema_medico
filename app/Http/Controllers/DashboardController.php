<?php

namespace App\Http\Controllers;

use App\Models\Consultorio;
use App\Models\Paciente;
use App\Models\Secretaria;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboardAdmin(){

        $contadorUser=User::all()->count();
        $contadorConsultorio=Consultorio::all()->count();
        $contadorSecretaria=Secretaria::all()->count();
        $contadorPaciente=Paciente::all()->count();
        return view('vista_paginas.administrador.dashboard_admin',
            compact('contadorUser','contadorConsultorio', 'contadorSecretaria', 'contadorPaciente'));

    }
}
