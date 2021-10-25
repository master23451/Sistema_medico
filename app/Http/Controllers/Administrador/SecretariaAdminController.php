<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use App\Models\Secretaria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SecretariaAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $secretaria=Secretaria::all();
        $vista=view('vista_paginas.administrador.secretaria.vista_lista_secretaria_admin')
        ->with('datos_Secretaria',$secretaria);

        return $vista;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vista=view('vista_paginas.administrador.secretaria.crear_secretaria_admin');
        return $vista;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $secretaria=new Secretaria();
        $secretaria->nombre=$request->input('nombre');
        $secretaria->apellidos=$request->input('apellido');
        $secretaria->usuario=$request->input('nombre').rand();
        $secretaria->email=$request->input('email');
        $secretaria->telefono=$request->input('telefono');
        $secretaria->celular=$request->input('celular');
        $secretaria->rol="Secretaria";

        if($request->hasFile('inputImgPerfil')){
            $secretaria->profile_photo_path=$request->file('inputImgPerfil')->store('public/fotos_perfil');
        }

        $secretaria->save();

        return redirect()->route('secretaria.edit', $secretaria->id)->with('guardado','ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $secretaria=Secretaria::find($id);
        $vista=view('vista_paginas.administrador.secretaria.editar_info_secretaria_admin')
        ->with('datos_secretaria',$secretaria);

        return $vista;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $secretaria=Secretaria::find($id);
        $secretaria->nombre=$request->input('nombre');
        $secretaria->apellidos=$request->input('apellido');
        $secretaria->usuario=$request->input('usuario');
        $secretaria->email=$request->input('email');
        $secretaria->telefono=$request->input('telefono');
        $secretaria->celular=$request->input('celular');
        $secretaria->rol="Secretaria";

        if($request->hasFile('inputImgPerfil')){
            Storage::delete($secretaria->profile_photo_path);
            $secretaria->profile_photo_path=$request->file('inputImgPerfil')->store('public/fotos_perfil');

        }

        $secretaria->update();

        return redirect()->route('secretaria.index')->with('modificado','ok');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $secretaria=Secretaria::find($id);
        Storage::delete($secretaria->profile_photo_path);
        $secretaria->delete();

        return redirect()->route('secretaria.index')->with('eliminado','ok');

    }
}
