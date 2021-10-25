@extends('adminlte::page')

@section('title', 'Admin || Secretaria')

@section('content_header')
    <h1>Ficha de información de la secretaria</h1>
    <h4>{{ $datos_secretaria->nombre }} {{ $datos_secretaria->apellidos }}</h4>
@stop

@section('content')
    <div class="container-fluid">
        <form action="{{ route('secretaria.update', $datos_secretaria->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
                <!------------------------------------------------------>
                <div class="px-2 py-4">
                    <h5>Foto de perfil</h5>
                    <div>
                        <img
                            src="{{ Illuminate\Support\Facades\Storage::url($datos_secretaria->profile_photo_path)}}"
                            alt="{{ $datos_secretaria->nombre }}"
                            style="border-radius: 100%; width: 150px; height: 150px; margin-left: 25px;">
                    </div>
                    <div class="mb-2 mt-2">
                        <button class="btn btn-secondary" id="btnSelectImgPerfil" type="button"><i class="fas fa-portrait"></i> Cambiar foto de perfil</button>
                        <input type="file" class="w-full form-control" id="inputImgPerfil" name="inputImgPerfil" style="display: none"/>
                    </div>
                </div>
                <!------------------------------------------------------------------------------>
                <div class="row">
                    <div class="col">
                        <label for="nombre">Nombre</label>
                        <input id="nombre" name="nombre" type="text" placeholder="Ingrese el nombre o los nombres de la secretaria" class="form-control" value="{{ $datos_secretaria->nombre }}"/>
                    </div>
                    <div class="col">
                        <label for="apellido">Apellidos</label>
                        <input id="apellido" name="apellido" type="text" placeholder="Ingrese los apellidos" class="form-control" value="{{ $datos_secretaria->apellidos }}"/>
                    </div>
                </div>
                <!------------------------------------------------------------------------------>
                <br>
                <div class="col">
                    <label for="usuario">Usuario</label>
                    <input id="usuario" name="usuario" type="text" placeholder="Ingrese un usuario" class="form-control" value="{{ $datos_secretaria->usuario }}"/>
                </div>
                <div class="col">
                    <label for="email">E-mail</label>
                    <input id="email" name="email" type="email" placeholder="Ingrese un correo electronico" class="form-control" value="{{ $datos_secretaria->email }}"/>
                </div>
                <!------------------------------------------------------------------------------>
                <br/>
                <div class="row">
                    <div class="col">
                        <label for="telefono">Numero de telefono</label>
                        <input id="telefono" name="telefono" type="tel" maxlength="10"
                               placeholder="Ingrese un numero de telefono" class="form-control" value="{{ $datos_secretaria->telefono }}"/>
                    </div>
                    <div class="col">
                        <label for="celular">Numero de telefono</label>
                        <input id="celular" name="celular" type="tel" maxlength="10"
                               placeholder="Ingrese un numero de celular" class="form-control" value="{{ $datos_secretaria->celular }}"/>
                    </div>
                </div>
                <div class="mb-4">
                    <hr/>
                    <button type="submit" class="btn btn-success" style="flex: auto"><i class="fas fa-save"></i> Guardar</button>
                    <a class="btn-secondary btn" href="{{ route('secretaria.index') }}"><i class="fas fa-arrow-circle-left"></i> Regresar</a>
                </div>
        </form>
        <!--------------------------------------------------------------------------------------------->
        <form action="{{ route('secretaria.destroy',  $datos_secretaria->id) }}" method="post">
            @csrf
            @method('delete')
            <div class="px-2 py-1">
                <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
            </div>
        </form>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script type="text/javascript">
        const inputImgPerfil=document.getElementById('inputImgPerfil');
        const btnSelectImgPerfil=document.getElementById('btnSelectImgPerfil');

        btnSelectImgPerfil.addEventListener("click", function (){
            inputImgPerfil.click()
        });
    </script>

    @if(session('guardado')=='ok')
        <script>
            Swal.fire({
                title: 'Guardado',
                text: 'La secretaria se registro correctamente',
                icon: 'success',
                confirmButtonColor: '#5dd91a',
                confirmButtonText: 'Aceptar'
            })
        </script>
    @endif
@stop
