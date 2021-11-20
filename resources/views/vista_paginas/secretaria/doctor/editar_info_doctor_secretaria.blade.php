@extends('adminlte::page')

@section('title', 'datos del doctor || '.  $doctor->nombre. " ".  $doctor->apellido_P)

@section('content_header')
    <h1>Ficha de datos del doctor</h1>
    <h4>{{ $doctor->nombre }} {{$doctor->apellido_P}}</h4>
@stop

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h4>Datos personales</h4>
                <hr>
                <form action="{{ route('doctor.admin.update', $doctor->id) }}" method="post"
                      enctype="multipart/form-data" id="modificar_datos">
                @csrf
                @method('put')
                <!-------------------------------Seleccion de fotos-------------------------------------------------------->
                    <div class="mb-4">
                        <h4>Foto de perfil</h4>
                        <img
                            src=" @if($doctor->profile_photo_path != '') {{ Illuminate\Support\Facades\Storage::url($doctor->profile_photo_path)}}
                            @else https://ui-avatars.com/api/?name={{ $doctor->nombre }}
                            @endif"
                            alt="{{ $doctor->nombre }}"
                            style="border-radius: 100%; width: 150px; height: 150px; margin-left: 25px;"
                            id="perfilImgPreview">

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
                                   value="{{$doctor->nombre}}" required/>
                            @error('nombre')
                            <small><span style="color: #d01414;">{{ $message }}</span></small>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="apellido_paterno">Apellido paterno</label>
                            <input id="apellido_paterno" name="apellido_paterno" type="text" placeholder="Ingrese su apellido paterno"
                                   class="form-control" value="{{$doctor->apellido_P}}" required/>
                            @error('apellido_paterno')
                            <small><span style="color: #d01414;">{{ $message }}</span></small>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="apellido_materno">Pellido materno</label>
                            <input id="apellido_materno" name="apellido_materno" type="text"
                                   placeholder="ingrese su apellido materno" class="form-control"
                                   value="{{$doctor->apellido_M}}" required/>
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
                               placeholder="Ingrese su domicilio" class="form-control"
                               value="{{$doctor->direccion}}" required/>
                        @error('direccion')
                        <small><span style="color: #d01414;">{{ $message }}</span></small>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="cp">CP</label>
                            <input id="cp" name="cp" type="text"
                                   placeholder="Ingrese su codigo postal" class="form-control" maxlength="10"
                                   value="{{$doctor->cp}}" required/>
                            @error('cp')
                            <small><span style="color: #d01414;">{{ $message }}</span></small>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="colonia">Colonia</label>
                            <input id="colonia" name="colonia" type="text"
                                   placeholder="Ingrese su colonia" class="form-control" value="{{$doctor->colonia}}" required/>
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
                               value="{{ $doctor->email }}" required/>
                        @error('e-mail')
                        <small><span style="color: #d01414;">{{ $message }}</span></small>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="telefono">Telefono</label>
                            <input id="telefono" name="telefono" type="tel" maxlength="10"
                                   placeholder="Ingrese un numero de telefono" class="form-control"
                                   value="{{ $doctor->telefono }}" required/>
                            @error('telefono')
                            <small><span style="color: #d01414;">{{ $message }}</span></small>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="celular">Celular</label>
                            <input id="celular" name="celular" type="tel" maxlength="10"
                                   placeholder="Ingrese un numero de celular" class="form-control"
                                   value="{{ $doctor->celular }}" required/>
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
                            @switch($doctor->sexo)
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
                    <h5>Datos laborales</h5>
                    <hr>
                    <div class="mb-4">
                        <label for="consultorio">Especialista</label>
                        <select id="consultorio" name="consultorio" class="form-control" required>
                            <option value="" disabled>Seleccionar...</option>
                            @foreach($consultorios as $item_consultorio)
                                <option value="{{ $item_consultorio->id }}" @if( $item_consultorio->id ==  $doctor->id_consultorio) selected @endif>
                                    {{  $item_consultorio->nombre }}
                                </option>
                            @endforeach
                        </select>
                        @error('consultorio')
                        <small><span style="color: #d01414;">{{ $message }}</span></small>
                        @enderror
                    </div>
                    <div class="row">
                        <!----------------Horarios------------------------------------>
                        <div class=col>
                            <label for="horarioE">Horario de entrda</label>
                            <input id="horarioE" name="horarioE" type="time" class="form-control" value="{{ $doctor->horario_E }}"/>
                        </div>
                        <div class=col>
                            <label for="horarioS">Horario de salida</label>
                            <input id="horarioS" name="horarioS" type="time" class="form-control" value="{{ $doctor->horario_S }}"/>
                        </div>
                    </div>
                    <!--------------------------------------------------------------------------------------------------------->
                    <!--------------------------------------------------------------------------------------------------------->
                    <br>
                    <div class="mb-4">
                        <label for="status">Estatus</label>
                        <select id="status" name="status" class="form-control" style="width: 49%" required>
                            <option value="" disabled>Seleccionar...</option>
                            @switch($doctor->status)
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
                        <a class="btn-secondary btn" href="{{ route('doctor.admin.index') }}"><i
                                class="fas fa-arrow-circle-left"></i> Regresar</a>
                    </div>
                </form>
                <form action="{{ route('doctor.admin.destroy',  $doctor->id) }}" method="post" id="borrar_datos">
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
                text: 'El doctor se registro correctamente',
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
                text: 'Los datos del doctor se han actualizado correctamente',
                icon: 'success',
                confirmButtonColor: '#5dd91a',
                confirmButtonText: 'Aceptar'
            })
        </script>
    @endif
@stop
