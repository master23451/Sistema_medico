<?php

namespace App\Http\Controllers\Seguridad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SeguridadController extends Controller
{
    public function vistaLogin(){

        return view('seguridad.login');

    }

    public function loginIngresar(Request $request){
        $credenciales = $request->validate([
            'email' => ['required', 'email','string'],
            'password' => ['required', 'string']
        ]);
        $recordar=$request->filled('recordar');

        if(Auth::attempt($credenciales,$recordar)){
            $request->session()->regenerate();

           return  redirect()->route('admin.index');
        }

        return  redirect()->route('login')->with('errorlogon','error');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');

    }
}
