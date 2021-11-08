<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PacienteAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paciente=Paciente::all();
        $vista=view('vista_paginas.administrador.paciente.lista_paciente_admin', compact('paciente'));

        return $vista;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vista=view('vista_paginas.administrador.paciente.crear_paciente_admin');
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

      /*  $request->validate([
            'inputImgPerfil' => ['image',],
            'nombre' => 'required',
            'apellido' => 'required',
            'email' => ['required', 'email'],
            'telefono1' => ['required', 'integer'],
            'celular1' => ['required', 'integer'],
            'expediente' => 'required',
            'sexo' => 'required',
        ]);*/

        $idr=rand();
        $paciente->id=$idr;
        $paciente->expediente=$request->input('exp');
        $paciente->nombre=$request->input('nombre');
        $paciente->apellido_P=$request->input('apellido_paterno');
        $paciente->apellido_M=$request->input('apellido_materno');
        $paciente->direccion=$request->input('direccion');
        $paciente->cp=$request->input('cp');
        $paciente->colonia=$request->input('colonia');
        $paciente->email=$request->input('email');
        $paciente->telefono=$request->input('telefono');
        $paciente->celular=$request->input('celular');
        $paciente->sexo=$request->input('sexo');
        $paciente->rol=4;

        if($request->hasFile('inputImgPerfil')){
            $paciente->profile_photo_path=$request->file('inputImgPerfil')->store('public/fotos_perfil');
        }

        $paciente->save();

        return redirect()->route('paciente.admin.edit', $idr)->with('guardado','ok');

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
        $vista=view('vista_paginas.administrador.paciente.editar_info_paciente_admin', compact('paciente'));

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

      /*  $request->validate([
            'inputImgPerfil' => ['image',],
            'nombre' => 'required',
            'apellido' => 'required',
            'usuario' => 'required',
            'email' => ['required', 'email'],
            'telefono' => ['required', 'integer'],
            'celular' => ['required', 'integer'],
            'expediente' => 'required',
            'sexo' => 'required',
            'status' => 'required',
        ]); */

        $paciente->nombre=$request->input('nombre');
        $paciente->apellido_P=$request->input('apellido_paterno');
        $paciente->apellido_M=$request->input('apellido_materno');
        $paciente->direccion=$request->input('direccion');
        $paciente->cp=$request->input('cp');
        $paciente->colonia=$request->input('colonia');
        $paciente->email=$request->input('email');
        $paciente->telefono=$request->input('telefono');
        $paciente->celular=$request->input('celular');
        $paciente->expediente=$request->input('exp');
        $paciente->sexo=$request->input('sexo');
        $paciente->rol=2;
        $paciente->status=$request->input('status');

        if($request->hasFile('inputImgPerfil')){
            Storage::delete($paciente->profile_photo_path);
            $paciente->profile_photo_path=$request->file('inputImgPerfil')->store('public/fotos_perfil');
        }

        $paciente->update();

        return redirect()->route('paciente.admin.edit', $id)->with('modificado','ok');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paciente=Paciente::find($id);
        Storage::delete($paciente->profile_photo_path);
        $paciente->delete();

        return redirect()->route('paciente.admin.index')->with('eliminado', 'ok');
    }
}
