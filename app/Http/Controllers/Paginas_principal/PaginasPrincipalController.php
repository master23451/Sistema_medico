<?php

namespace App\Http\Controllers\Paginas_principal;

use App\Http\Controllers\Controller;
use App\Models\Mensaje_administrador;
use App\Models\Vistas\Vw_contador_doctor;
use App\Models\Vistas\Vw_contador_paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class PaginasPrincipalController extends Controller
{
    /*----------------------------------------------------------------------------------------------------------------*/
    /*---------------------Metodos para que el administrador haga su modificaciones ----------------------------------*/

    public function indexInfoGeneralAdministrador(){

        $contador_paciente=Vw_contador_paciente::all();
        $contador_doctores=Vw_contador_doctor::all();
        $post=Mensaje_administrador::orderBy('id', 'asc')->first();
        return view('vista_paginas.administrador.index_admin')
            ->with('contador_Paciente',$contador_paciente)
            ->with('contador_doctor', $contador_doctores)
            ->with('ver_post',$post);
    }

    public function editarInfoGneral(){


    }

    public function guardarInfoGeneral(){


    }

    /*-------------------------Creacion de publicaciones administrador---------------------------------------------------------*/
    public function lista_post(){

        $post=Mensaje_administrador::all();
        $vista=view('vista_paginas.administrador.publicaciones.lista_post')
        ->with('lista_post', $post);
        return $vista;

    }

    public function crear_post(){

        $vista=view('vista_paginas.administrador.publicaciones.crear_post');
        return $vista;
    }

    public function guardar_post(Request $request){

        $post=new Mensaje_administrador();
        $post->titulo=$request->input('titulo_post');
        $post->mensaje=$request->input('texto_descrip');
        $post->imagen=$request->file('inputImgPost')->store('public/imagen_post');
        $post->fecha_publicacion=$request->input('fecha_publicacion');

        $post->save();

        return redirect()->route('administrador.lista.publicaciones')->with('guardado','ok');
    }

    public function editar_post($id){

        $post=Mensaje_administrador::find($id);
        $vista=view('vista_paginas.administrador.publicaciones.editar_post')
        ->with('dato_post',$post);

        return $vista;

    }

    public function actualizar_post(Request $request, $id){

        $post=Mensaje_administrador::find($id);
        $post->titulo=$request->input('titulo_post');
        $post->mensaje=$request->input('texto_descrip');
        $post->fecha_publicacion=$request->input('fecha_publicacion');

        if($request->hasFile('inputImgPost')){
            Storage::delete($post->imagen);
            $post->imagen=$request->file('inputImgPost')->store('public/imagen_post');
        }

        $post->save();

        return redirect()->route('administrador.lista.publicaciones')->with('modificado','ok');

    }

    public function eliminar_post($id){

        $post=Mensaje_administrador::find($id);
        Storage::delete($post->imagen);
        $post->delete();

        return redirect()->route('administrador.lista.publicaciones')->with('eliminado','ok');
    }

    public function vista_post($id){

        $post=Mensaje_administrador::find($id);
        return view('vista_paginas.administrador.publicaciones.ver_post')->with('ver_post',$post);
    }
    /*----------------------------------------------------------------------------------------------------------------*/
    public function indexSecretaria(){


    }
    /*----------------------------------------------------------------------------------------------------------------*/

    public function indexDoctor(){



    }
    /*----------------------------------------------------------------------------------------------------------------*/

    public function indexPaciente(){



    }

}
