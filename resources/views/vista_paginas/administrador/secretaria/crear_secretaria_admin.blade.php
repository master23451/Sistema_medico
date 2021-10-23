@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Secretaria</h1>
    <p>Registrar a una nueva secretaria.</p>
@stop

@section('content')
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <!--------------------------------------------------------------------------------------------->
                    <form action="{{ route('secretaria.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="container">
                            <!-----------------------Foto de perfil------------------------------------------------>
                            <div class="px-2 py-4">
                                <h5>Foto de perfil</h5>
                                <div>
                                    <img
                                        src=""
                                        alt="sin imagen"
                                        style="border-radius: 100%; width: 150px; height: 150px; margin-left: 25px;">
                                </div>
                                <div class="mb-2 mt-2">
                                    <button class="btn btn-secondary" type="button" id="file-image"><i class="fas fa-portrait"></i> Elige una foto de perfil</button>
                                    <input type="file" class="w-full hide"  id="archivo_img" name="archivo_img" style="display: none;"/>
                                </div>
                            </div>
                            <!---------------------------------------------------------------------------------------------------->
                            <div class="row">
                                <div class="col">
                                    <label for="nombre">Nombre</label>
                                    <input id="nombre" name="nombre" type="text" placeholder="Ingrese el nombre o los nombres del doctor" class="form-control" />
                                </div>
                                <div class="col">
                                    <label for="apellido">Apellidos</label>
                                    <input id="apellido" name="apellido" type="text" placeholder="Ingrese los apellidos" class="form-control"/>
                                </div>
                            </div>
                            <!----------------------------------------------------------------------------------------------------->
                            <br/>
                            <div class="row">
                                <div class="col">
                                    <label for="usuario">Usuario</label>
                                    <input id="usuario" name="usuario" type="text" placeholder="Ingrese un usuario" class="form-control"/>
                                </div>
                                <div class="col">
                                    <label for="email">E-mail</label>
                                    <input id="email" name="email" type="email" placeholder="Ingrese un correo electronico" class="form-control"/>
                                </div>
                            </div>
                            <!----------------------------------------------------------------------------------------------------->
                            <br/>
                            <div class="mb-4">
                                <label for="contra">Contraseña</label>
                                <input id="contra" name="contra" type="text" placeholder="Ingrese una contraseña con un minimo 8 caracteres" class="form-control"/>
                            </div>
                            <div class="mb-4">
                                <label for="contra_validacion">Validad nuevamente la contraseña</label>
                                <input id="contra_validacion" name="contra_validacion" type="text" placeholder="Ingrese nuevamente la contraseña" class="form-control"/>
                            </div>
                            <div class="mb-4">
                                <label for="num_contacto">Numero de telefono</label>
                                <input id="num_contacto" name="num_contacto" type="tel" maxlength="10" placeholder="Ingrese un numero de telefono" class="form-control"/>
                            </div>
                            <!------------------------------------------------------------------------------------->
                            <div class="mb-4">
                                <hr/>
                                <button type="submit" class="btn btn-success" style="flex: auto"><i class="fas fa-save"></i> Guardar</button>
                                <a class="btn-danger btn" href="{{ route('secretaria.index') }}"><i class="fas fa-arrow-circle-left"></i> Regresar</a>
                            </div>
                            <!------------------------------------------------------------------------------------->
                        </div>
                    </form>
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
        const archivoImgCrearSecret=document.getElementById('archivo_img');
        const fileImgBtnCrearSecret=document.getElementById('file-image');
        fileImgBtnCrearSecret.addEventListener("click", function (){
            archivoImgCrearSecret.click();
        });
    </script>
@stop
