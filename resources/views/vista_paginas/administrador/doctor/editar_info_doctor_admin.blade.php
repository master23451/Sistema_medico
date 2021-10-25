@extends('adminlte::page')

@section('title', 'perfil || Doctor'." ".$datos_doctor->nombre." ".$datos_doctor->apellidos)

@section('content_header')
    <h1>Ficha de datos del doctor</h1>
    <h4>{{$datos_doctor->nombre}} {{$datos_doctor->apellidos}}</h4>
@stop

@section('content')
    <!------------------------------------------------------------------------------------------------->
    <div class="container-fluid">
        <form action="{{ route('doctor.update', $datos_doctor->id) }}" method="post"
              enctype="multipart/form-data">
        @csrf
        @method('put')
        <!-------------------------------Seleccion de fotos-------------------------------------------------------->
            <h5>Datos personales</h5>
            <hr>
            <div class="px-2 py-4">
                <h4>Foto de perfil</h4>
                <div>
                    <img
                        src="{{ Illuminate\Support\Facades\Storage::url($datos_doctor->profile_photo_path)}}"
                        alt="{{ $datos_doctor->nombre }}"
                        style="border-radius: 100%; width: 150px; height: 150px; margin-left: 25px;">
                </div>
                <div class="mb-2 mt-2">
                    <button class="btn btn-secondary" id="btnSelectImgPerfil" type="button"><i
                            class="fas fa-portrait" style=""></i> Cambiar foto de perfil
                    </button>
                    <input type="file" class="form-control" id="inputImgPerfil"
                           name="inputImgPerfil" style="display: none"/>
                </div>
            </div>
            <!--------------------------------------------------------------------------------------------------------->
            <div class="row">
                <div class="col">
                    <label for="nombre">Nombre</label>
                    <input id="nombre" name="nombre" type="text"
                           placeholder="Ingrese el nombre o los nombres del doctor" class="form-control"
                           value="{{$datos_doctor->nombre}}"/>
                </div>
                <div class="col">
                    <label for="apellido">Apellidos</label>
                    <input id="apellido" name="apellido" type="text" placeholder="Ingrese los apellidos"
                           class="form-control" value="{{$datos_doctor->apellidos}}"/>
                </div>
                <div class="col">
                    <label for="usuario">Usuario</label>
                    <input id="usuario" name="usuario" type="text"
                           placeholder="Ingrese un usuario" class="form-control"
                           value="{{$datos_doctor->usuario}}"/>
                </div>
            </div>
            <!--------------------------------------------------------------------------------------------------------->
            <br>
            <div class="mb-4">
                <label for="email">E-mail</label>
                <input id="email" name="email" type="email"
                       placeholder="Ingrese un correo electronico" class="form-control"
                       value="{{$datos_doctor->email}}"/>
            </div>
            <br>
            <!--------------------------------------------------------------------------------------------------------->
            <div class="row">
                <div class="col">
                    <label for="telefono">Numero de telefono</label>
                    <input id="telefono" name="telefono" type="tel" maxlength="10"
                           placeholder="Ingrese un numero de telefono" class="form-control"
                           value="{{ $datos_doctor->telefono }}"/>
                </div>
                <div class="col">
                    <label for="celular">Numero de celular</label>
                    <input id="celular" name="celular" type="tel" maxlength="10"
                           placeholder="Ingrese un numero de celular" class="form-control"
                           value="{{ $datos_doctor->celular }}"/>
                </div>
            </div>
            <div class="mb-4">
                <label for="sexo">Sexo</label>
                <select id="sexo" name="sexo" class="form-control">
                    <option selected>Seleccionar...</option>
                    @switch($datos_doctor->sexo)
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
            <h5>Datos laborales</h5>
            <hr>
            <div class="row">
                <div class="col">
                    <label for="consultorio">Consultorio</label>
                    <select id="consultorio" name="consultorio" class="form-control">
                        <option value="">Seleccionar...</option>
                        @foreach($consultorios as $item_consultorio)
                            <option value="{{ $item_consultorio->id }}">{{ $item_consultorio->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <!----------------Horarios------------------------------------>
                <div class="col">
                    <label for="horarios">Horario de trabajo</label>
                    <input id="horarios" name="horarios" type="time" class="form-control"
                           value="{{ $datos_doctor->horarios }}"/>
                </div>
            </div>
            <!--------------------------------------------------------------------------------------------------------->
            <div class="mb-4">
                <hr/>
                <button type="submit" class="btn btn-success" style="flex: auto"><i
                        class="fas fa-save"></i> Guardar
                </button>
                <a class="btn-secondary btn" href="{{ route('doctor.index') }}"><i
                        class="fas fa-arrow-circle-left"></i> Regresar</a>
            </div>
        </form>
        <!------------------------------------------------------------------------------------------------->
        <form action="{{ route('doctor.destroy', $datos_doctor->id) }}" method="post">
            @csrf
            @method('delete')
            <div class="px-2 py-1">
                <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
            </div>
        </form>
    </div>
    <!------------------------------------------------------------------------------------------------->
    <br/>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>

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
                text: 'El doctor se registro correctamente',
                icon: 'success',
                confirmButtonColor: '#5dd91a',
                confirmButtonText: 'Aceptar'
            })
        </script>
    @endif
@stop
