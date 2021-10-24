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
        $admin=new Administrador();
        $admin->nombre=$request->input('nombre');
        $admin->apellidos=$request->input('apellido');
        $admin->usuario=$request->input('usuario');
        $admin->contra=$request->input('contra');
        $admin->email=$request->input('email');
        $admin->numero_contacto=$request->input('num_contacto');
        $admin->sexo=$request->input('sexo');

        if($request->hasFile('archivo_img_Admin')){
            $admin->profile_photo_path=$request->file('archivo_img_Admin')->store('public/fotos_perfil');
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
        $admin=Administrador::find($id);
        $admin->nombre=$request->input('nombre');
        $admin->apellidos=$request->input('apellido');
        $admin->usuario=$request->input('usuario');
        $admin->contra=$request->input('contra');
        $admin->email=$request->input('email');
        $admin->numero_contacto=$request->input('num_contacto');
        $admin->sexo=$request->input('sexo');

        if($request->hasFile('archivo_img_Admin')){
            Storage::delete($admin->profile_photo_path);
            $admin->profile_photo_path=$request->file('archivo_img_Admin')->store('public/fotos_perfil');
        }

        $admin->update();

        return redirect()->route('admin.index')->with('modificado','ok');
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
