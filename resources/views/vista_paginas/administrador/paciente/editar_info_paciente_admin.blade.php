@extends('adminlte::page')

@section('title',  'Paciente ||'." ".$dato_paciente->nombre." ".$dato_paciente->apellidos)

@section('content_header')
    <h1>Ficha de informaón del paciente</h1>
    <h4>{{ $dato_paciente->nombre }} {{ $dato_paciente->apellidos }}</h4>
@stop

@section('content')
    <div>
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <!--------------------------------------------------------------------------------------------->
                        <form action="{{ route('paciente.update', $dato_paciente->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="container">
                                <!--------------------------------------------------------------------------------------------------------->
                                <div class="px-2 py-4">
                                    <h5>Foto de perfil</h5>
                                    <div>
                                        <img
                                            src="{{ Illuminate\Support\Facades\Storage::url($dato_paciente->profile_photo_path)}}"
                                            alt="{{ $dato_paciente->nombre }}"
                                            style="border-radius: 100%; width: 150px; height: 150px; margin-left: 25px;">
                                    </div>
                                    <div class="mb-2 mt-2">
                                        <button class="btn btn-secondary" id="file-image_editar_paciente" type="button"><i class="fas fa-portrait"></i> Cambiar foto de perfil</button>
                                        <input type="file" class="w-full form-control" id="archivo_img_editar_paciente" name="archivo_img_editar_paciente" style="display: none"/>
                                    </div>
                                </div>
                                <!--------------------------------------------------------------------------------------------------------->
                                <div class="row">
                                    <div class="col">
                                        <label for="nombre">Nombre</label>
                                        <input id="nombre" name="nombre" type="text" placeholder="Ingrese el nombre o los nombres de la secretaria" class="form-control" value="{{ $dato_paciente->nombre }}"/>
                                    </div>
                                    <div class="col">
                                        <label for="apellido">Apellidos</label>
                                        <input id="apellido" name="apellido" type="text" placeholder="Ingrese los apellidos" class="form-control" value="{{ $dato_paciente->apellidos }}"/>
                                    </div>
                                </div>
                                <!--------------------------------------------------------------------------------------------------------->
                                <br/>
                                <div class="row">
                                    <div class="col">
                                        <label for="usuario">Usuario</label>
                                        <input id="usuario" name="usuario" type="text" placeholder="Ingrese un usuario" class="form-control" value="{{ $dato_paciente->usuario }}"/>
                                    </div>
                                    <div class="col">
                                        <label for="email">E-mail</label>
                                        <input id="email" name="email" type="email" placeholder="Ingrese un correo electronico" class="form-control" value="{{ $dato_paciente->email }}"/>
                                    </div>
                                </div>
                                <!--------------------------------------------------------------------------------------------------------->
                                <br/>
                                <div class="mb-4">
                                    <label for="expediente">Expediente</label>
                                    <input id="expediente" name="expediente" type="text"
                                           placeholder="Verifique si su expediente es el correcto" class="form-control" value="{{ $dato_paciente->expediente }}"/>
                                </div>
                                <div class="mb-4">
                                    <label for="contra">Contraseña</label>
                                    <input id="contra" name="contra" type="text" placeholder="Ingrese una contraseña con un minimo 8 caracteres" class="form-control" value="{{ $dato_paciente->contra }}"/>
                                </div>
                                <div class="mb-4">
                                    <label for="contra">Validad la contraseña</label>
                                    <input id="contra" name="contra" type="text" placeholder="Re-ingrese la contraseña para validarla" class="form-control" />
                                </div>
                                <div class="mb-4">
                                    <label for="num_contacto">Numero de telefono</label>
                                    <input id="num_contacto" name="num_contacto" type="tel" maxlength="10" placeholder="Ingrese un numero de telefono" class="form-control" value="{{ $dato_paciente->numero_contacto }}"/>
                                </div>
                                <div class="mb-4">
                                    <label for="sexo">Sexo</label>
                                    <select id="sexo" name="sexo" class="form-control">
                                        <option selected disabled>Seleccionar...</option>
                                        @switch($dato_paciente->sexo)
                                            @case('Hombre')
                                            <option value="Hombre" selected>Hombre</option>
                                            <option value="Mujer">Mujer</option>
                                            @break
                                            @case('Mujer')
                                            <option value="Hombre">Hombre</option>
                                            <option value="Mujer" selected>Mujer</option>
                                            @break
                                        @endswitch
                                    </select>
                                </div>
                                <hr>
                                <button class="btn btn-success" type="submit"><i class="fas fa-save"></i> Guardar</button>
                                <a class="btn btn-secondary" href="{{ route('paciente.index') }}"><i class="fas fa-arrow-circle-left"></i> Cancelar</a>
                            </div>
                        </form>
                        <br>
                        <!--------------------------------------------------------------------------------------------->
                        <form action="{{ route('paciente.destroy', $dato_paciente->id) }}" method="post">
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
        const archivoImgEditPaciente=document.getElementById('archivo_img_editar_paciente');
        const fileImgBtnEditPaciente=document.getElementById('file-image_editar_paciente');
        fileImgBtnEditPaciente.addEventListener("click", function (){
            archivoImgEditPaciente.click();
        });
    </script>

    @if(session('guardado')=='ok')
        <script>
            Swal.fire({
                title: 'Guardado',
                text: 'El paciente se registro correctamente',
                icon: 'success',
                confirmButtonColor: '#5dd91a',
                confirmButtonText: 'Aceptar'
            })
        </script>
    @endif
@stop
