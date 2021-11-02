<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboardAdmin(){

        $contadorUser=User::all()->count();
        return view('vista_paginas.administrador.dashboard_admin', compact('contadorUser'));

    }
}
