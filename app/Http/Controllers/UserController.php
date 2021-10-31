<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Roles;
use App\Models\Vistas\Vw_usuario_roles;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Gate::authorize('loginAdministrador')){
        $datos_usuario = Vw_usuario_roles::all();
        $vista=view('usuarios.lista_usuarios', compact('datos_usuario',$datos_usuario));

        return $vista;

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::authorize('loginAdministrador')){
            $roles=Roles::all();
            $vista=view('usuarios.crear_usuario', compact('roles', $roles));
            return $vista;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Gate::authorize('loginAdministrador')){

            $request->validate([
                'inputImgPerfil' => ['image'],
                'nombre' => 'required',
                'email' => ['required', 'email'],
                'telefono' => ['required', 'integer'],
                'celular' => ['required', 'integer'],
                'sexo' => 'required',
                'rol' => 'required',
            ]);

            $user=new User();
            $user->name=$request->input('nombre');
            $user->user=$request->input('nombre').rand();
            $user->email=$request->input('email');
            $user->telefono=$request->input('telefono');
            $user->celular=$request->input('celular');
            $user->sexo=$request->input('sexo');
            $user->rol=$request->input('rol');



            if($request->hasFile('inputImgPerfil')){
                $user->profile_photo_path=$request->file('inputImgPerfil')->store('public/fotos_perfil');
            }

            $user->save();

            return redirect()->route('usuario.edit', $user->id)->with('guardado','ok');
        }
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
        if(Gate::authorize('loginAdministrador')){

            $roles=Roles::all();
            $usuario=User::find($id);
            $vista=view('usuarios.editar_usuario', compact('usuario', $usuario), compact('roles', $roles));

            return $vista;

        }
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
        if(Gate::authorize('loginAdministrador')){

            $request->validate([
                'inputImgPerfil' => ['image'],
                'nombre' => 'required',
                'usuario' => 'required',
                'email' => ['required', 'email'],
                'telefono' => ['required', 'integer'],
                'celular' => ['required', 'integer'],
                'sexo' => 'required',
                'rol' => 'required',
                'status' => 'required',
            ]);

            $user=User::find($id);
            $user->name=$request->input('nombre');
            $user->user=$request->input('usuario');
            $user->email=$request->input('email');
            $user->telefono=$request->input('telefono');
            $user->celular=$request->input('celular');
            $user->sexo=$request->input('sexo');
            $user->status=$request->input('status');
            $user->rol=$request->input('rol');


            if($request->hasFile('inputImgPerfil')){
                Storage::delete($user->profile_photo_path);
                $user->profile_photo_path=$request->file('inputImgPerfil')->store('public/fotos_perfil');
            }


            $user->update();

            return redirect()->route('usuario.edit', $id)->with('modificado','ok');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Gate::authorize('loginAdministrador')){
            $usuario=User::find($id);
            Storage::delete($usuario->profile_photo_path);
            $usuario->delete();

            return redirect()->route('usuario.index')->with('eliminado','ok');

        }
    }

    public function editPerfil(){

        $vista=view('auth.perfil');
        return $vista;

    }
}
