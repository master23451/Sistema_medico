@extends('adminlte::page')

@section('title', 'Admin || Secretaria')

@section('content_header')
    <h1>Ficha de información de la secretaria</h1>
    <h4>{{ $datos_secretaria->nombre }} {{ $datos_secretaria->apellidos }}</h4>
@stop

@section('content')
    <div>
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <!--------------------------------------------------------------------------------------------->
                        <form action="{{ route('secretaria.update', $datos_secretaria->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="container">
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
                                        <button class="btn btn-secondary" id="file-image_editar_secretaria" type="button"><i class="fas fa-portrait"></i> Cambiar foto de perfil</button>
                                        <input type="file" class="w-full form-control" id="archivo_img_editar_secretaria" name="archivo_img_editar_secretaria" style="display: none"/>
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
                                <br/>
                                <div class="row">
                                    <div class="col">
                                        <label for="usuario">Usuario</label>
                                        <input id="usuario" name="usuario" type="text" placeholder="Ingrese un usuario" class="form-control" value="{{ $datos_secretaria->usuario }}"/>
                                    </div>
                                    <div class="col">
                                        <label for="email">E-mail</label>
                                        <input id="email" name="email" type="email" placeholder="Ingrese un correo electronico" class="form-control" value="{{ $datos_secretaria->email }}"/>
                                    </div>
                                </div>
                                <!------------------------------------------------------------------------------>
                                <br/>
                                <div class="mb-4">
                                    <label for="contra">Contraseña</label>
                                    <input id="contra" name="contra" type="text" placeholder="Ingrese una contraseña con un minimo 8 caracteres" class="form-control" value="{{ $datos_secretaria->contra }}"/>
                                </div>
                                <div class="mb-4">
                                    <label for="contra">Validad la contraseña</label>
                                    <input id="contra" name="contra" type="text"
                                           placeholder="Re-ingrese la contraseña para validarla" class="form-control" value=""/>
                                </div>
                                <div class="mb-4">
                                    <label for="num_contacto">Numero de telefono</label>
                                    <input id="num_contacto" name="num_contacto" type="tel" maxlength="10"
                                           placeholder="Ingrese un numero de telefono" class="form-control" value="{{ $datos_secretaria->numero_contacto }}"/>
                                </div>
                                <div class="mb-4">
                                    <hr/>
                                    <button type="submit" class="btn btn-success" style="flex: auto"><i class="fas fa-save"></i> Guardar</button>
                                    <a class="btn-secondary btn" href="{{ route('secretaria.index') }}"><i class="fas fa-arrow-circle-left"></i> Regresar</a>
                                </div>
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
                        <br/>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>

    <script type="text/javascript">
        const archivoImgEditSecret=document.getElementById('archivo_img_editar_secretaria');
        const fileImgBtnEditSecret=document.getElementById('file-image_editar_secretaria');
        fileImgBtnEditSecret.addEventListener("click", function (){
            archivoImgEditSecret.click();
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
