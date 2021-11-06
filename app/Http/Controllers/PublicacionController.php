<?php

namespace App\Http\Controllers;

use App\Models\Publicacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PublicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publicaciones = Publicacion::all();

        return view('publicaciones.lista_publicacion', compact('publicaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('publicaciones.crear_publicacion');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $publicacion = new Publicacion();
        $publicacion->titulo=$request->input('titulo');
        $publicacion->mensaje=$request->input('mensjae');

        if($request->hasFile('inputImgPublicacion')){
            $publicacion->imagen=$request->file('inputImgPublicacion')->store('public/imga_publicacion');
        }

        if($publicacion->save()){
            return redirect()->route('publicacion.index')->with('publicado', 'ok');
        }

        return redirect()->route('publicacion.create')->with('err_publicar', 'error');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $publicacion=Publicacion::find($id);
        return view('publicaciones.ver_publicacion', compact('publicacion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $publicacion=Publicacion::find($id);
        return  view('publicaciones.editar_publicacion', compact('publicacion'));
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
        $publicacion = Publicacion::find($id);
        $publicacion->titulo=$request->input('titulo');
        $publicacion->mensaje=$request->input('mensjae');

        if($request->hasFile('inputImgPublicacion')){
            Storage::delete($publicacion->imagen);
            $publicacion->imagen=$request->file('inputImgPublicacion')->store('public/imga_publicacion');
        }

        if($publicacion->update()){
            return redirect()->route('publicacion.edit', $id)->with('modificado', 'ok');
        }

        return redirect()->route('publicacion.edit', $id)->with('err_publicar', 'error');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $publicacion = Publicacion::find($id);
        Storage::delete($publicacion->imagen);

        if($publicacion->delete()){
            return redirect()->route('publicacion.index')->with('eliminado', 'ok');
        }
        return redirect()->route('publicacion.edit', $id)->with('err_publicar', 'error');
    }
}
