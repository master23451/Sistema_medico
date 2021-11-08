@extends('adminlte::page')

@section('title', 'Crear nuevo paciente || Admin')

@section('content_header')
    <h1>Pacientes</h1>
    <p>Registrar a un nuevo paciente.</p>
@stop

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h4>Datos personales</h4>
                <hr>
                <form action="{{ route('paciente.admin.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <h5>Foto de perfil</h5>
                        <img
                            src="https://ui-avatars.com/api/?name={{ __('SIN') }}"
                            alt="sin imagen"
                            style="border-radius: 100%; width: 150px; height: 150px; margin-left: 25px;"
                            id="perfilImgPreview">

                        <div class="mb-2 mt-2">
                            <button class="btn btn-secondary" type="button" id="btnSelectImgPerfil"><i class="fas fa-portrait"></i> Elige una foto de perfil</button>
                            <input type="file" class="form-control"  id="inputImgPerfil" name="inputImgPerfil" style="display: none;" accept="image/*"/>
                            @error('inputImgPerfil')
                            <small><span style="color: #d01414;">{{ $message }}</span></small>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="nombre">Nombre</label>
                            <input id="nombre" name="nombre" type="text"
                                   placeholder="Ingrese el nombre o los nombres de la secretaria" class="form-control"
                                   required/>
                            @error('nombre')
                            <small><span style="color: #d01414;">{{ $message }}</span></small>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="apellido_paterno">Apellido Paterno</label>
                            <input id="apellido_paterno" name="apellido_paterno" type="text"
                                   placeholder="Ingrese su apellido paterno"
                                   class="form-control" required/>
                            @error('apellido_paterno')
                            <small><span style="color: #d01414;">{{ $message }}</span></small>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="apellido_materno">Apellido Materno</label>
                            <input id="apellido_materno" name="apellido_materno" type="text"
                                   placeholder="ingrese su apellido materno"
                                   class="form-control" required/>
                            @error('apellido_materno')
                            <small><span style="color: #d01414;">{{ $message }}</span></small>
                            @enderror
                        </div>
                    </div>
                    <!--------------------------------------------------------------------------------------------------------->
                    <br/>
                    <div class="mb-4">
                        <label for="exp">Expediente</label>
                        <input id="exp" name="exp" type="text" placeholder="Registre el numero de expediente del paciente"
                               class="form-control" required/>
                        @error('exp')
                        <small><span style="color: #d01414;">{{ $message }}</span></small>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="direccion">Dirección</label>
                        <input id="direccion" name="direccion" type="text" placeholder="Ingrese su domicilio"
                               class="form-control" required/>
                        @error('direccion')
                        <small><span style="color: #d01414;">{{ $message }}</span></small>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="cp">CP</label>
                            <input id="cp" name="cp" type="text" maxlength="10" placeholder="Ingrese su codigo postal"
                                   class="form-control" required/>
                            @error('cp')
                            <small><span style="color: #d01414;">{{ $message }}</span></small>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="colonia">Colonia</label>
                            <input id="colonia" name="colonia" type="text" placeholder="Ingrese su colonia"
                                   class="form-control" required/>
                            @error('colonia')
                            <small><span style="color: #d01414;">{{ $message }}</span></small>
                            @enderror
                        </div>
                    </div>
                    <br/>
                    <div class="mb-4">
                        <label for="email">E-mail</label>
                        <input id="email" name="email" type="email" placeholder="Ingrese un correo electronico"
                               class="form-control" required/>
                        @error('email')
                        <small><span style="color: #d01414;">{{ $message }}</span></small>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="telefono">Telefono</label>
                            <input id="telefono" name="telefono" type="tel" maxlength="10"
                                   placeholder="Ingrese un numero de telefono" class="form-control" required/>
                            @error('telefono')
                            <small><span style="color: #d01414;">{{ $message }}</span></small>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="celular">Celular</label>
                            <input id="celular" name="celular" type="tel" maxlength="10"
                                   placeholder="Ingrese un numero de celular" class="form-control" required/>
                            @error('celular')
                            <small><span style="color: #d01414;">{{ $message }}</span></small>
                            @enderror
                        </div>
                    </div>
                    <br/>
                    <div class="mb-4">
                        <label for="sexo">Sexo</label>
                        <select id="sexo" name="sexo" class="form-control" required>
                            <option selected disabled>Seleccionar...</option>
                            <option value="Hombre">Hombre</option>
                            <option value="Mujer">Mujer</option>
                        </select>
                        @error('sexo')
                        <small><span style="color: #d01414;">{{ $message }}</span></small>
                        @enderror
                    </div>
                    <hr/>
                    <div class="mb-4">
                        <button type="submit" class="btn btn-success" style="flex: auto"><i class="fas fa-save"></i> Guardar</button>
                        <a class="btn-danger btn" href="{{ route('paciente.admin.index') }}"><i class="fas fa-arrow-circle-left"></i> Regresar</a>
                    </div>
                </form>
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
