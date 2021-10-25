<?php

namespace App\Http\Controllers\Secretaria;

use App\Http\Controllers\Controller;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class PacienteSecretariaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paciente=Paciente::all();
        $vista=view('vista_paginas.secretaria.paciente.vista_lista_paciente_secretaria')
        ->with('datos_paciente', $paciente);

        return $vista;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vista=view('vista_paginas.secretaria.paciente.crear_paciente_secretaria');

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
        $paciente=new Paciente();
        $paciente->nombre=$request->input('nombre');
        $paciente->apellidos=$request->input('apellido');
        $paciente->usuario=$request->input('nombre').rand();
        $paciente->email=$request->input('email');
        $paciente->telefono=$request->input('telefono');
        $paciente->celular=$request->input('celular');
        $paciente->expediente=$request->input('expediente');
        $paciente->sexo=$request->input('sexo');
        $paciente->rol="Paciente";

        if($request->hasFile('inputImgPerfil')){
            $paciente->profile_photo_path=$request->file('inputImgPerfil')->store('public/fotos_perfil');
        }

        $paciente->save();

        return redirect()->route('secretaria.paciente.edit', $paciente->id)->with('guardado','ok');
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
        $paciente=Paciente::find($id);
        $vista=view('vista_paginas.secretaria.paciente.editar_info_paciente_secretaria')
            ->with('dato_paciente', $paciente);

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

        $paciente = Paciente::find($id);
        $paciente->nombre=$request->input('nombre');
        $paciente->apellidos=$request->input('apellido');
        $paciente->usuario=$request->input('usuario');
        $paciente->email=$request->input('email');
        $paciente->telefono=$request->input('telefono');
        $paciente->celular=$request->input('celular');
        $paciente->expediente=$request->input('expediente');
        $paciente->sexo=$request->input('sexo');
        $paciente->rol="Paciente";

        if($request->hasFile('inputImgPerfil')){
            Storage::delete($paciente->profile_photo_path);
            $paciente->profile_photo_path=$request->file('inputImgPerfil')->store('public/fotos_perfil');
        }

        $paciente->update();

        return redirect()->route('secretaria.paciente.edit', $id)->with('bloqueo','m-block');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
