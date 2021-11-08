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
        $vista=view('vista_paginas.administrador.secretaria.lista_secretaria_admin', compact('secretaria'));

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
     /*   $request->validate([
            'inputImgPerfil' => ['image',],
            'nombre' => 'required',
            'apellido' => 'required',
            'email' => ['required', 'email'],
            'telefono' => ['required', 'integer'],
            'celular' => ['required', 'integer'],
        ]);*/

        $idr=rand();
        $secretaria->id=$idr;
        $secretaria->nombre=$request->input('nombre');
        $secretaria->apellido_P=$request->input('apellido_paterno');
        $secretaria->apellido_M=$request->input('apellido_materno');
        $secretaria->direccion=$request->input('direccion');
        $secretaria->cp=$request->input('cp');
        $secretaria->colonia=$request->input('colonia');
        $secretaria->email=$request->input('email');
        $secretaria->telefono=$request->input('telefono');
        $secretaria->celular=$request->input('celular');
        $secretaria->rol=3;

        if($request->hasFile('inputImgPerfil')){
            $secretaria->profile_photo_path=$request->file('inputImgPerfil')->store('public/fotos_perfil');
        }

        $secretaria->save();

        return redirect()->route('secretaria.admin.edit', $idr)->with('guardado','ok');
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
        $vista=view('vista_paginas.administrador.secretaria.editar_info_secretaria_admin',compact('secretaria'));

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

        /*$request->validate([
            'inputImgPerfil' => ['image',],
            'nombre' => 'required',
            'apellido' => 'required',
            'usuario' => 'required',
            'email' => ['required', 'email'],
            'telefono' => ['required', 'integer'],
            'celular' => ['required', 'integer'],
            'status' => 'required',
        ]);*/

        $secretaria->nombre=$request->input('nombre');
        $secretaria->apellido_P=$request->input('apellido_paterno');
        $secretaria->apellido_M=$request->input('apellido_materno');
        $secretaria->direccion=$request->input('direccion');
        $secretaria->cp=$request->input('cp');
        $secretaria->colonia=$request->input('colonia');
        $secretaria->email=$request->input('email');
        $secretaria->telefono=$request->input('telefono');
        $secretaria->celular=$request->input('celular');
        $secretaria->rol=2;
        $secretaria->status=$request->input('status');

        if($request->hasFile('inputImgPerfil')){
            Storage::delete($secretaria->profile_photo_path);
            $secretaria->profile_photo_path=$request->file('inputImgPerfil')->store('public/fotos_perfil');
        }

        $secretaria->update();

        return redirect()->route('secretaria.admin.edit',$id)->with('modificado','ok');

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

        return redirect()->route('secretaria.admin.index')->with('eliminado','ok');

    }
}
