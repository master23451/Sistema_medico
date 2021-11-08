@extends('adminlte::page')

@section('title', 'datos de la secretaria || '.  $secretaria->nombre. " ".  $secretaria->apellido_P)

@section('content_header')
    <h1>Ficha de información de la secretaria</h1>
    <h4>{{ $secretaria->nombre }} {{ $secretaria->apellido_P }}</h4>
@stop

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('secretaria.admin.update', $secretaria->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <!-------------------------------Seleccion de fotos-------------------------------------------------------->
                    <div class="mb-4">
                        <h4>Foto de perfil</h4>
                        @if($secretaria->profile_photo_path != '')
                            <div>
                                <img
                                    src="{{ Illuminate\Support\Facades\Storage::url($secretaria->profile_photo_path)}}"
                                    alt="{{ $secretaria->nombre }}"
                                    style="border-radius: 100%; width: 150px; height: 150px; margin-left: 25px;"
                                    id="perfilImgPreview">
                            </div>
                        @else
                            <img
                                src="https://ui-avatars.com/api/?name={{ $secretaria->nombre }}"
                                alt="{{ $secretaria->nombre }}"
                                style="border-radius: 100%; width: 150px; height: 150px; margin-left: 25px;"
                                id="perfilImgPreview">
                        @endif
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
                                   value="{{$secretaria->nombre}}" required/>
                            @error('nombre')
                            <small><span style="color: #d01414;">{{ $message }}</span></small>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="apellido_paterno">Apellido paterno</label>
                            <input id="apellido_paterno" name="apellido_paterno" type="text" placeholder="Ingrese su apellido paterno"
                                   class="form-control" value="{{$secretaria->apellido_P}}" required/>
                            @error('apellido_paterno')
                            <small><span style="color: #d01414;">{{ $message }}</span></small>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="apellido_materno">Pellido materno</label>
                            <input id="apellido_materno" name="apellido_materno" type="text"
                                   placeholder="ingrese su apellido materno" class="form-control"
                                   value="{{$secretaria->apellido_M}}" required/>
                            @error('apellido_materno')
                            <small><span style="color: #d01414;">{{ $message }}</span></small>
                            @enderror
                        </div>
                    </div>
                    <!--------------------------------------------------------------------------------------------------------->
                    <br>
                    <div class="mb-4">
                        <label for="direccion">Dirección</label>
                        <input id="direccion" name="direccion" type="text"
                               placeholder="Ingrese un correo electronico" class="form-control"
                               value="{{$secretaria->direccion}}" required/>
                        @error('direccion')
                        <small><span style="color: #d01414;">{{ $message }}</span></small>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="cp">CP</label>
                            <input id="cp" name="cp" type="text"
                                   placeholder="Ingrese su codigo postal" class="form-control" maxlength="10"
                                   value="{{$secretaria->cp}}" required/>
                            @error('cp')
                            <small><span style="color: #d01414;">{{ $message }}</span></small>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="colonia">Colonia</label>
                            <input id="colonia" name="colonia" type="text"
                                   placeholder="Ingrese su colonia" class="form-control" value="{{$secretaria->colonia}}" required/>
                            @error('colonia')
                            <small><span style="color: #d01414;">{{ $message }}</span></small>
                            @enderror
                        </div>
                    </div>
                    <!--------------------------------------------------------------------------------------------------------->
                    <br/>
                    <div class="mb-4">
                        <label for="email">E-mail</label>
                        <input id="email" name="email" type="email"
                               placeholder="Ingrese un correo electronico" class="form-control"
                               value="{{ $secretaria->email }}" required/>
                        @error('e-mail')
                        <small><span style="color: #d01414;">{{ $message }}</span></small>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="telefono">Telefono</label>
                            <input id="telefono" name="telefono" type="tel" maxlength="10"
                                   placeholder="Ingrese un numero de telefono" class="form-control"
                                   value="{{ $secretaria->telefono }}" required/>
                            @error('telefono')
                            <small><span style="color: #d01414;">{{ $message }}</span></small>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="celular">Celular</label>
                            <input id="celular" name="celular" type="tel" maxlength="10"
                                   placeholder="Ingrese un numero de celular" class="form-control"
                                   value="{{ $secretaria->celular }}" required/>
                            @error('celular')
                            <small><span style="color: #d01414;">{{ $message }}</span></small>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <!--------------------------------------------------------------------------------------------------------->
                    <div class="mb-4">
                        <label for="status">Estatus</label>
                        <select id="status" name="status" class="form-control" style="width: 49%" required>
                            <option value="" disabled>Seleccionar...</option>
                            @switch($secretaria->status)
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
                        <a class="btn-secondary btn" href="{{ route('secretaria.admin.index') }}"><i
                                class="fas fa-arrow-circle-left"></i> Regresar</a>
                    </div>
            </form>
            <form action="{{ route('secretaria.admin.destroy',  $secretaria->id) }}" method="post" id="borrar_datos">
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
                text: 'La secretaria se registro correctamente',
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
                text: 'Los datos de la secretaria se han actualizado correctamente',
                icon: 'success',
                confirmButtonColor: '#5dd91a',
                confirmButtonText: 'Aceptar'
            })
        </script>
    @endif
@stop
