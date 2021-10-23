<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use App\Models\Consultorio;
use App\Models\Doctor;
use App\Models\Vistas\Vw_doctor_consultorio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DoctorAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vw_cmedico_consultorio=Vw_doctor_consultorio::all();
        $vista=view('vista_paginas.administrador.doctor.vista_lista_doctor_admin')
            ->with('listado_doctores',$vw_cmedico_consultorio);
        return $vista;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $consultorio=Consultorio::all();
        $vista=view('vista_paginas.administrador.doctor.crear_doctor_admin')
        ->with('consultorios', $consultorio);
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
        $doctor->id_consultorio=$request->input('consultorio');
        $doctor->nombre=$request->input('nombre');
        $doctor->apellidos=$request->input('apellido');
        $doctor->profile_photo_path=$request->file('archivo_img_doct')->store('public/fotos_perfil');
        $doctor->usuario=$request->input('usuario');
        $doctor->contra=$request->input('contra');
        $doctor->email=$request->input('email');
        $doctor->numero_contacto=$request->input('num_contacto');
        $doctor->sexo=$request->input('sexo');
        $doctor->horarioE=$request->input('horarioE');
        $doctor->horarioS=$request->input('horarioS');
        $doctor->save();

        return redirect()->route('doctor.edit',  $doctor->id)->with('guardado','ok');
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
        $consultorio=Consultorio::all();
        $vista=view('vista_paginas.administrador.doctor.editar_info_doctor_admin')
        ->with('datos_doctor',$doctor)
        ->with('consultorios', $consultorio);

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
        $doctor->id_consultorio=$request->input('consultorio');
        $doctor->nombre=$request->input('nombre');
        $doctor->apellidos=$request->input('apellido');
        $doctor->usuario=$request->input('usuario');
        $doctor->contra=$request->input('contra');
        $doctor->email=$request->input('email');
        $doctor->numero_contacto=$request->input('num_contacto');
        $doctor->sexo=$request->input('sexo');
        $doctor->horarioE=$request->input('horarioE');
        $doctor->horarioS=$request->input('horarioS');

        if($request->hasFile('archivo_img_doct')){
            Storage::delete($doctor->profile_photo_path);
            $doctor->profile_photo_path=$request->file('archivo_img_doct')->store('public/fotos_perfil');
        }

        $doctor->update();

        return redirect()->route('doctor.index')->with('modificado','ok');
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

        return redirect()->route('doctor.index')->with('eliminado','ok');
    }
}
