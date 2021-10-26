<?php

namespace App\Http\Controllers\Paginas_principal;

use App\Http\Controllers\Controller;
use App\Models\Mensaje_administrador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class PaginasPrincipalController extends Controller
{
    /*----------------------------------------------------------------------------------------------------------------*/
    /*---------------------Metodos para que el administrador haga su modificaciones ----------------------------------*/

    public function indexInfoGeneralAdministrador(){


    }

    public function editarInfoGneral(){


    }

    public function guardarInfoGeneral(){


    }

    /*-------------------------Creacion de post administrador---------------------------------------------------------*/
    public function lista_post(){

        $post=Mensaje_administrador::all();
        $vista=view('vista_paginas.administrador.indexes.lista_post')
        ->with('lista_post', $post);
        return $vista;

    }

    public function crear_post(){

        $vista=view('vista_paginas.administrador.indexes.crear_post');
        return $vista;
    }

    public function guardar_post(Request $request){

        $post=new Mensaje_administrador();
        $post->titulo=$request->input('titulo_post');
        $post->mensaje=$request->input('texto_descrip');
        $post->imagen=$request->file('inputImgPost')->store('public/imagen_post');
        $post->fecha_publicacion=$request->input('fecha_publicacion');

        $post->save();

        return redirect()->route('administrador.lista.post')->with('guardado','ok');
    }

    public function editar_post($id){

        $post=Mensaje_administrador::find($id);
        $vista=view('vista_paginas.administrador.indexes.editar_post')
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

        return redirect()->route('administrador.lista.post')->with('modificado','ok');

    }

    public function eliminar_post($id){

        $post=Mensaje_administrador::find($id);
        Storage::delete($post->imagen);
        $post->delete();

        return redirect()->route('administrador.lista.post')->with('eliminado','ok');
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
