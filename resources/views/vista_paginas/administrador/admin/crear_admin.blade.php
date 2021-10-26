@extends('adminlte::page')

@section('title', 'Crear nuevo administrador || Admin')

@section('content_header')
    <h1>Registra a nuevo administrador en el sistema</h1>
    <p>Complete la informacion de manera correcta.</p>
@stop

@section('content')
<div class="container-fluid">
    <form action="{{ route('admin.store') }}" method="post" enctype="multipart/form-data">
        @csrf
            <!-------------------------------Seleccion de fotos-------------------------------------------------------->
            <div class="px-2 py-4">
                <h5>Foto de perfil</h5>
                <div>
                    <img
                        src=""
                        alt="sin imagen"
                        style="border-radius: 100%; width: 150px; height: 150px; margin-left: 25px;"
                        id="perfilImgPreview"
                    >
                </div>
                <div class="mb-2 mt-2">
                    <button class="btn btn-secondary" id="btnSelectImgPerfil" type="button"><i class="fas fa-portrait"></i> Elige una foto de perfil</button>
                    <input type="file" class="form-control"  id="inputImgPerfil" name="inputImgPerfil" style="display: none"/>
                </div>
            </div>
            <!--------------------------------------------------------------------------------------------------------->
            <div class="row">
                <div class="col">
                    <label for="nombre">Nombre</label>
                    <input id="nombre" name="nombre" type="text" placeholder="Ingrese el nombre o los nombres del administrador" class="form-control"/>
                </div>
                <div class="col">
                    <label for="apellido">Apellidos</label>
                    <input id="apellido" name="apellido" type="text" placeholder="Ingrese los apellidos" class="form-control"/>
                </div>
            </div>
            <!--------------------------------------------------------------------------------------------------------->
            <br>
            <div class="mb-4">
                    <label for="email">E-mail</label>
                    <input id="email" name="email" type="email" placeholder="Ingrese un correo electronico" class="form-control"/>
            </div>
            <!--------------------------------------------------------------------------------------------------------->
            <div class="row">
                <div class="col">
                    <label for="telefono">Numero de telefono</label>
                    <input id="telefono" name="telefono" type="tel" maxlength="10" placeholder="Ingrese un numero de telefono" class="form-control"/>
                </div>
                <div class="col">
                    <label for="celular">Numero de celualar</label>
                    <input id="celular" name="celular" type="tel" maxlength="10" placeholder="Ingrese un numero de celular" class="form-control"/>
                </div>
            </div>
            <div class="mb-4">
                <label for="sexo">Sexo</label>
                <select id="sexo" name="sexo" class="form-control">
                    <option>Seleccionar...</option>
                    <option value="Hombre">Hombre</option>
                    <option value="Mujer">Mujer</option>
                </select>
            </div>
            <!--------------------------------------------------------------------------------------------------------->
            <div class="mb-4">
                <hr/>
                <button type="submit" class="btn btn-success" style="flex: auto"><i class="fas fa-save"></i> Guardar</button>
                <a class="btn-danger btn" href="{{ route('admin.index') }}"><i class="fas fa-arrow-circle-left"></i> Regresar</a>
            </div>
    </form>
    <!------------------------------------------------------------------------------------------------->
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
