<?php

namespace App\Http\Controllers;

use App\Notifications\RegistrarUsuarioNotificacion;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Roles;
use App\Models\Vistas\Vw_usuario_roles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    use Notifiable;

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

            $user=new User();
            $roles=Roles::all();
            $rolAsignado='';

            $request->validate([
                'inputImgPerfil' => ['image'],
                'nombre' => 'required',
                'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
                'telefono' => ['required', 'integer'],
                'celular' => ['required', 'integer'],
                'sexo' => 'required',
                'rol' => 'required',
            ]);

            $user->name=$request->input('nombre');
            $user->user=$request->input('nombre').rand();
            $user->email=$request->input('email');
            $user->password=Hash::make('12345678');
            $user->telefono=$request->input('telefono');
            $user->celular=$request->input('celular');
            $user->sexo=$request->input('sexo');
            $user->rol=$request->input('rol');



            if($request->hasFile('inputImgPerfil')){
                $user->profile_photo_path=$request->file('inputImgPerfil')->store('public/fotos_perfil');
            }


            if($user->save()){

                foreach ($roles as $item){
                    if($item->id == $request->input('rol')){
                        $rolAsignado=$item->nombre;
                    }
                }
                $user->notify(new RegistrarUsuarioNotificacion($user->email=$request->input('email'), $rolAsignado));

                return redirect()->route('usuario.edit', $user->id)->with('guardado','ok');
            }

            return redirect()->route('usuario.create')->with('form_error','error');
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

            $user=User::find($id);

            $request->validate([
                'inputImgPerfil' => ['image'],
                'nombre' => 'required',
                'usuario' => 'required',
                'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
                'telefono' => ['required', 'integer'],
                'celular' => ['required', 'integer'],
                'sexo' => 'required',
                'rol' => 'required',
                'status' => 'required',
            ]);

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

    public function actualizar_perfil(Request $request, $id){

            $user=User::find($id);

            $request->validate([
                'inputImgPerfil' => ['image'],
                'nombre' => 'required',
                'usuario' => 'required',
                'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
                'telefono' => ['required', 'integer'],
                'celular' => ['required', 'integer'],
                'sexo' => 'required',
                'rol' => 'required',
                'status' => 'required',
            ]);

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

            return redirect()->route('perfil')->with('modificado','ok');
    }

    public function eliminar_perfil($id){

        $usuario=User::find($id);
        Storage::delete($usuario->profile_photo_path);
        $usuario->delete();

        return redirect()->route('login')->with('eliminado','ok');

    }
}
