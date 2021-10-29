@extends('adminlte::page')

@section('title', 'perfil || Administrador'." ".$dato_administrador->nombre." ".$dato_administrador->apellidos)

@section('content_header')
    <h1>Ficha de datos del administrador</h1>
    <h4>{{$dato_administrador->nombre}} {{$dato_administrador->apellidos}}</h4>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <H4>Datos personales</H4>
        <hr>
        <!------------------------------------------------------------------------------------------------->
        <div class="container-fluid">
            <form action="{{ route('admin.update', $dato_administrador->id) }}" method="post"
                  enctype="multipart/form-data" id="modificar_datos">
            @csrf
            @method('put')
            <!-------------------------------Seleccion de fotos-------------------------------------------------------->
                <div class="px-2 py-4">
                    <h5>Foto de perfil</h5>
                    <div>
                        <img
                            src="{{ Illuminate\Support\Facades\Storage::url($dato_administrador->profile_photo_path)}}"
                            alt="{{ $dato_administrador->nombre }}"
                            style="border-radius: 100%; width: 150px; height: 150px; margin-left: 25px;"
                            id="perfilImgPreview"
                        >
                    </div>
                    <div class="mb-2 mt-2">
                        <button class="btn btn-secondary" id="btnSelectImgPerfil" type="button"><i
                                class="fas fa-portrait" style=""></i> Cambiar foto de perfil
                        </button>
                        <input type="file" class="form-control" id="inputImgPerfil"
                               name="inputImgPerfil" style="display: none" accept="image/*"/>
                        @error('inputImgPerfil')
                        <small><span style="color: #d01414;">{{ $message }}</span></small>
                        @enderror
                    </div>
                </div>
                <!--------------------------------------------------------------------------------------------------------->
                <div class="row">
                    <div class="col">
                        <label for="nombre">Nombre</label>
                        <input id="nombre" name="nombre" type="text"
                               placeholder="Ingrese el nombre o los nombres del doctor" class="form-control"
                               value="{{$dato_administrador->nombre}}" required/>
                        @error('nombre')
                        <small><span style="color: #d01414;">{{ $message }}</span></small>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="apellido">Apellidos</label>
                        <input id="apellido" name="apellido" type="text" placeholder="Ingrese los apellidos"
                               class="form-control" value="{{$dato_administrador->apellidos}}" required/>
                        @error('apellido')
                        <small><span style="color: #d01414;">{{ $message }}</span></small>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="usuario">Usuario</label>
                        <input id="usuario" name="usuario" type="text" placeholder="Ingrese un usuario"
                               class="form-control" value="{{ $dato_administrador->usuario }}" required/>
                        @error('usuario')
                        <small><span style="color: #d01414;">{{ $message }}</span></small>
                        @enderror
                    </div>
                </div>
                <!--------------------------------------------------------------------------------------------------------->
                <br>
                <div class="mb-4">
                    <label for="email">E-mail</label>
                    <input id="email" name="email" type="email"
                           placeholder="Ingrese un correo electronico" class="form-control"
                           value="{{$dato_administrador->email}}" required/>
                    @error('email')
                    <small><span style="color: #d01414;">{{ $message }}</span></small>
                    @enderror
                </div>
                <!--------------------------------------------------------------------------------------------------------->
                <div class="row">
                    <div class="col">
                        <label for="telefono">Telefono</label>
                        <input id="telefono" name="telefono" type="tel" maxlength="10" placeholder="Ingrese un numero de telefono" class="form-control" value="{{ $dato_administrador->telefono }}" required/>
                        @error('telefono')
                        <small><span style="color: #d01414;">{{ $message }}</span></small>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="celular">Celualar</label>
                        <input id="celular" name="celular" type="tel" maxlength="10" placeholder="Ingrese un numero de celular" class="form-control" value="{{ $dato_administrador->celular }}" required/>
                        @error('celular')
                        <small><span style="color: #d01414;">{{ $message }}</span></small>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="mb-4">
                    <label for="sexo">Sexo</label>
                    <select id="sexo" name="sexo" class="form-control" required>
                        <option disabled>Seleccionar...</option>
                        @switch($dato_administrador->sexo)
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
                    @error('sexo')
                    <small><span style="color: #d01414;">{{ $message }}</span></small>
                    @enderror
                </div>
                <!--------------------------------------------------------------------------------------------------------->
                <div class="mb-4">
                    <label for="status">Estatus</label>
                    <select id="status" name="status" class="form-control" style="width: 49%" required>
                        <option value="" disabled>Seleccionar...</option>
                        @switch($dato_administrador->status)
                            @case(1)
                            <option value="1" selected>Activo</option>
                            <option value="0">Inactivo</option>
                            @break
                            @case(0)
                            <option value="1">Activo</option>
                            <option value="0" selected>Inactivo</option>
                            @break
                        @endswitch
                    </select>
                    @error('status')
                    <small><span style="color: #d01414;">{{ $message }}</span></small>
                    @enderror
                </div>
                <!--------------------------------------------------------------------------------------------------------->
                <div class="mb-4">
                    <hr/>
                    <button type="submit" class="btn btn-warning" style="flex: auto"><i
                            class="fas fa-save"></i> Modificar
                    </button>
                    <a class="btn-secondary btn" href="{{ route('admin.index') }}"><i
                            class="fas fa-arrow-circle-left"></i> Regresar</a>
                </div>
            </form>
            <!------------------------------------------------------------------------------------------------->
            <form action="{{ route('admin.destroy', $dato_administrador->id) }}" method="post" id="borrar_datos">
                @csrf
                @method('delete')
                <div class="mb-4">
                    <button class="btn btn-danger"><i class="fas fa-trash"></i> Eliminar definitivamente</button>
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

    @if(session('guardado')=='ok')
        <script>
            Swal.fire({
                title: 'Guardado',
                text: 'El administrador se registro correctamente',
                icon: 'success',
                confirmButtonColor: '#5dd91a',
                confirmButtonText: 'Aceptar'
            })
        </script>
    @endif

    <script>
        $('#borrar_datos').submit(function (e) {
            e.preventDefault();

            Swal.fire({
                title: '¿Esta seguro de eliminar la informacion?',
                text: "Ya no podra recuperara la informacion",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#5dd91a',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.value) {
                    this.submit();
                }
            });

        });
    </script>

    <script>
        $('#modificar_datos').submit(function (e) {
            e.preventDefault();

            Swal.fire({
                title: '¿Esta seguro de modificar los datos?',
                text: "Ya no podra reveretir esta accion",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#5dd91a',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Modificar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.value) {
                    this.submit();
                }
            });

        });
    </script>

    @if(session('modificado') == 'ok')
        <script>
            Swal.fire({
                title: 'Modificado',
                text: 'Los datos del administrador se han actualizado correctamente',
                icon: 'success',
                confirmButtonColor: '#5dd91a',
                confirmButtonText: 'Aceptar'
            })
        </script>
    @endif
@stop
