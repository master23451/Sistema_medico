<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use App\Models\Administrador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdministradoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin=Administrador::all();
        $vista=view('vista_paginas.administrador.admin.vista_lista_admin')
            ->with('datos_administradores', $admin);

        return $vista;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vista=view('vista_paginas.administrador.admin.crear_admin');

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
        $request->validate([
            'inputImgPerfil' => ['image',],
            'nombre' => 'required',
            'apellido' => 'required',
            'email' => ['required', 'email'],
            'telefono' => 'required',
            'celular' => 'required',
            'sexo' => 'required',
        ]);


        $admin=new Administrador();
        $admin->nombre=$request->input('nombre');
        $admin->apellidos=$request->input('apellido');
        $admin->usuario=$request->input('nombre').rand();
        $admin->email=$request->input('email');
        $admin->telefono=$request->input('telefono');
        $admin->celular=$request->input('celular');
        $admin->sexo=$request->input('sexo');
        $admin->rol='administrador';



        if($request->hasFile('inputImgPerfil')){
            $admin->profile_photo_path=$request->file('inputImgPerfil')->store('public/fotos_perfil');
        }

        $admin->save();

        return redirect()->route('admin.edit', $admin->id)->with('guardado','ok');
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
        $admin=Administrador::find($id);
        $vista=view('vista_paginas.administrador.admin.editar_info_admin')
            ->with('dato_administrador',$admin);

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

        $request->validate([
            'inputImgPerfil' => ['image',],
            'nombre' => 'required',
            'apellido' => 'required',
            'usuario' => 'required',
            'email' => ['required', 'email'],
            'telefono' => 'required',
            'celular' => 'required',
            'sexo' => 'required',
            'status' => 'required',
        ]);

        $admin=Administrador::find($id);
        $admin->nombre=$request->input('nombre');
        $admin->apellidos=$request->input('apellido');
        $admin->usuario=$request->input('usuario');
        $admin->email=$request->input('email');
        $admin->telefono=$request->input('telefono');
        $admin->celular=$request->input('celular');
        $admin->sexo=$request->input('sexo');
        $admin->rol='administrador';
        $admin->status=$request->input('status');

        if($request->hasFile('inputImgPerfil')){
            Storage::delete($admin->profile_photo_path);
            $admin->profile_photo_path=$request->file('inputImgPerfil')->store('public/fotos_perfil');
        }

        $admin->update();

        return redirect()->route('admin.edit',  $id)->with('modificado','ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin=Administrador::find($id);
        Storage::delete($admin->profile_photo_path);
        $admin->delete();

        return redirect()->route('admin.index')->with('eliminado','ok');
    }
}
