@extends('adminlte::page')

@section('title', 'Crear paciente || Admin')

@section('content_header')
    <h1>Pacientes</h1>
    <p>Registrar a un nuevo paciente.</p>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <h4>Datos personales</h4>
        <hr>
        <div class="container-fluid">
            <!--------------------------------------------------------------------------------------------->
            <form action="{{ route('paciente.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <!-------------------------------Seleccion de fotos------------------------------------------------>
                <div class="mb-4">
                    <h5>Foto de perfil</h5>
                    <div>
                        <img
                            src=""
                            alt="sin imagen"
                            style="border-radius: 100%; width: 150px; height: 150px; margin-left: 25px;"
                            id="perfilImgPreview">
                    </div>
                    <div class="mb-2 mt-2">
                        <button class="btn btn-secondary" id="btnSelectImgPerfil" type="button"><i class="fas fa-portrait"></i> Elige una foto de perfil</button>
                        <input type="file" class="form-control"  id="inputImgPerfil" name="inputImgPerfil" style="display: none" accept="image/*"/>
                        @error('inputImgPerfil')
                        <small><span style="color: #d01414;">{{ $message }}</span></small>
                        @enderror
                    </div>
                </div>
                <!--------------------------------------------------------------------------------------------------------->
                <div class="row">
                    <div class="col">
                        <label for="nombre">Nombre</label>
                        <input id="nombre" name="nombre" type="text" placeholder="Ingrese el nombre o los nombres del paciente" class="form-control" required/>
                        @error('nombre')
                        <small><span style="color: #d01414;">{{ $message }}</span></small>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="apellido">Apellidos</label>
                        <input id="apellido" name="apellido" type="text" placeholder="Ingrese los apellidos" class="form-control" required/>
                        @error('apellido')
                        <small><span style="color: #d01414;">{{ $message }}</span></small>
                        @enderror
                    </div>
                </div>
                <!--------------------------------------------------------------------------------------------------------->
                <br/>
                <div class="mb-4">
                    <label for="email">E-mail</label>
                    <input id="email" name="email" type="email" placeholder="Ingrese un correo electronico" class="form-control" required/>
                    @error('email')
                    <small><span style="color: #d01414;">{{ $message }}</span></small>
                    @enderror
                </div>
                <!--------------------------------------------------------------------------------------------------------->
                <div class="mb-4">
                    <label for="expediente">Expediente</label>
                    <input class="form-control" id="expediente" name="expediente" placeholder="Ingrese el numero del expediente correspondiente" required/>
                    @error('expediente')
                    <small><span style="color: #d01414;">{{ $message }}</span></small>
                    @enderror
                </div>
                <!--------------------------------------------------------------------------------------------------------->
                <div class="row">
                    <div class="col">
                        <label for="telefono1">Telefono</label>
                        <input id="telefono1" name="telefono1" type="tel" maxlength="10" placeholder="ingrese un numero de telefono" class="form-control" required/>
                        @error('telefono1')
                        <small><span style="color: #d01414;">{{ $message }}</span></small>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="celular1">Celular</label>
                        <input name="celular1" id="celular1" type="tel" maxlength="10" placeholder="Ingrese un numero de celular" class="form-control" required/>
                        @error('celular1')
                        <small><span style="color: #d01414;">{{ $message }}</span></small>
                        @enderror
                    </div>
                </div>
                <!--------------------------------------------------------------------------------------------------------->
                <br>
                <div class="mb-4">
                    <label for="sexo">Sexo</label>
                    <select id="sexo" name="sexo" class="form-control" required>
                        <option>Seleccionar...</option>
                        <option value="Hombre">Hombre</option>
                        <option value="Mujer">Mujer</option>
                    </select>
                    @error('sexo')
                    <small><span style="color: #d01414;">{{ $message }}</span></small>
                    @enderror
                </div>
                <!--------------------------------------------------------------------------------------------->
                <hr>
                <button class="btn btn-success" type="submit"><i class="fas fa-save"></i> Guardar</button>
                <a class="btn btn-danger" href="{{ route('paciente.index') }}"><i class="fas fa-arrow-circle-left"></i> Cancelar</a>
            </form>
            <br>
            <!--------------------------------------------------------------------------------------------->
        </div>
    </div>
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

    <script type="text/javascript">
        function readImage (input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#perfilImgPreview').attr('src', e.target.result); // Renderizamos la imagen
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#inputImgPerfil").change(function () {
            // Código a ejecutar cuando se detecta un cambio de archivO
            readImage(this);
        });
    </script>
@stop
