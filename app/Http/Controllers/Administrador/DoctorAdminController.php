<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use App\Models\Consultorio;
use App\Models\Doctor;
use App\Models\Vistas\Vw_doctor_consultorio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Ramsey\Uuid\Uuid;

class DoctorAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosDoctores=Vw_doctor_consultorio::all();
        $vista=view('vista_paginas.administrador.doctor.lista_doctor_admin', compact('datosDoctores'));
        return $vista;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $consultorios=Consultorio::all();
        $vista=view('vista_paginas.administrador.doctor.crear_doctor_admin', compact('consultorios'));
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
        $doctor=new Doctor();

      /*  $request->validate([
            'inputImgPerfil' => ['image',],
            'consultorio' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
            'email' => ['required', 'email', Rule::unique('doctor')->ignore($doctor->id)],
            'telefono' => ['required', 'integer'],
            'celular' => ['required', 'integer'],
            'sexo' => 'required',
        ]);*/
        $idr=rand();
        $doctor->id=$idr;
        $doctor->id_consultorio=$request->input('consultorio');
        $doctor->nombre=$request->input('nombre');
        $doctor->apellido_P=$request->input('apellido_paterno');
        $doctor->apellido_M=$request->input('apellido_materno');
        $doctor->direccion=$request->input('direccion');
        $doctor->cp=$request->input('cp');
        $doctor->colonia=$request->input('colonia');
        $doctor->email=$request->input('email');
        $doctor->telefono=$request->input('telefono');
        $doctor->celular=$request->input('celular');
        $doctor->sexo=$request->input('sexo');
        $doctor->horario_E=$request->input('horarioE');
        $doctor->horario_S=$request->input('horarioS');
        $doctor->rol=3;

        if($request->hasFile('inputImgPerfil')){
            $doctor->profile_photo_path=$request->file('inputImgPerfil')->store('public/fotos_perfil');
        }

        $doctor->save();

        return redirect()->route('doctor.admin.edit', $idr)->with('guardado','ok');
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
        $doctor = Doctor::find($id);
        $consultorios=Consultorio::all();
        $vista=view('vista_paginas.administrador.doctor.editar_doctor_admin', compact('doctor', 'consultorios'));
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
        $doctor=Doctor::find($id);

      /*  $request->validate([
            'inputImgPerfil' => ['image',],
            'consultorio' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
            'usuario' => 'required',
            'email' => ['required', 'email',],
            'telefono' => ['required', 'integer'],
            'celular' => ['required', 'integer'],
            'sexo' => 'required',
            'status' => 'required'
        ]);*/


        $doctor->id_consultorio=$request->input('consultorio');
        $doctor->nombre=$request->input('nombre');
        $doctor->apellido_P=$request->input('apellido_paterno');
        $doctor->apellido_M=$request->input('apellido_materno');
        $doctor->direccion=$request->input('direccion');
        $doctor->cp=$request->input('cp');
        $doctor->colonia=$request->input('colonia');
        $doctor->email=$request->input('email');
        $doctor->telefono=$request->input('telefono');
        $doctor->celular=$request->input('celular');
        $doctor->sexo=$request->input('sexo');
        $doctor->horario_E=$request->input('horarioE');
        $doctor->horario_S=$request->input('horarioS');
        $doctor->rol=3;
        $doctor->status=$request->input('status');

        if($request->hasFile('inputImgPerfil')){
            Storage::delete($doctor->profile_photo_path);
            $doctor->profile_photo_path=$request->file('inputImgPerfil')->store('public/fotos_perfil');
        }

        $doctor->update();

        return redirect()->route('doctor.admin.edit',$id)->with('modificado','ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctor=Doctor::find($id);

        Storage::delete($doctor->profile_photo_path);
        $doctor->delete();

        return redirect()->route('doctor.admin.index')->with('eliminado','ok');
    }
}
