@extends('adminlte::page')

@section('title', 'perfil del usuario || ' .Auth()->user()->name)

@section('content_header')
    <h1>Ficha de datos del usuario</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body container-fluid">
            <h4>Actualizar datos personales</h4>
            <hr>
            <!------------------------------------------------------------------------------------------------->
            <form action="{{ route('usuario.perfil.update', Auth()->user()->id) }}" method="post"
                  enctype="multipart/form-data" id="modificar_datos">
            @csrf
            @method('put')
            <!-------------------------------Seleccion de fotos-------------------------------------------------------->
                <div class="mb-4">
                    <h5>Foto de perfil</h5>
                    <div>
                        @if(Auth()->user()->profile_photo_path != '')
                            <img
                                src="{{ Illuminate\Support\Facades\Storage::url(Auth()->user()->profile_photo_path)}}"
                                alt="{{ Auth()->user()->name }}"
                                style="border-radius: 100%; width: 150px; height: 150px; margin-left: 25px;"
                                id="perfilImgPreview">
                        @else
                            <img
                                src="https://ui-avatars.com/api/?name={{Auth()->user()->name}}"
                                alt="{{ Auth()->user()->name }}"
                                style="border-radius: 100%; width: 150px; height: 150px; margin-left: 25px;"
                                id="perfilImgPreview">
                        @endif
                    </div>
                    <div class="mb-2 mt-2">
                        <button class="btn btn-secondary" id="btnSelectImgPerfil" type="button"><i
                                class="fas fa-portrait" style=""></i> Cambiar foto de perfil
                        </button>
                        <input type="file" class="form-control" id="inputImgPerfil"
                               name="inputImgPerfil"  accept="image/*" style="display: none"/>
                        @error('inputImgPerfil')
                        <small><span style="color: #d01414;">{{ $message }}</span></small>
                        @enderror
                    </div>
                </div>
                <!----------------------------------------------------------------------------------------------------->
                <div class="row">
                    <div class="col">
                        <label for="nombre">Nombre</label>
                        <input id="nombre" name="nombre" type="text"
                               placeholder="Ingrese el nombre o los nombres del doctor" class="form-control"
                               value="{{Auth()->user()->name}}" required/>
                        @error('nombre')
                        <small><span style="color: #d01414;">{{ $message }}</span></small>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="usuario">Usuario</label>
                        <input id="usuario" name="usuario" type="text" placeholder="Ingrese un usuario"
                               class="form-control" value="{{ Auth()->user()->user }}" required/>
                        @error('usuario')
                        <small><span style="color: #d01414;">{{ $message }}</span></small>
                        @enderror
                    </div>
                </div>
                <!----------------------------------------------------------------------------------------------------->
                <br>
                <div class="mb-4">
                    <label for="email">E-mail</label>
                    <input id="email" name="email" type="email"
                           placeholder="Ingrese un correo electronico" class="form-control"
                           value="{{Auth()->user()->email}}" required/>
                    @error('email')
                    <small><span style="color: #d01414;">{{ $message }}</span></small>
                    @enderror
                    @if(Auth()->user()->email_verified_at != null)
                        <small class="text-success">Correo verificado.</small>
                    @else
                        <small class="text-danger">EL usuario no a verificado su correo.</small>
                    @endif
                </div>
                    <!------------------------------------------------------------------------------------------------->
                <div class="row">
                    <div class="col">
                        <label for="telefono">Telefono</label>
                        <input id="telefono" name="telefono" type="tel" maxlength="10" placeholder="Ingrese un numero de telefono" class="form-control" value="{{ Auth()->user()->telefono }}" required/>
                        @error('telefono')
                        <small><span style="color: #d01414;">{{ $message }}</span></small>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="celular">Celualar</label>
                        <input id="celular" name="celular" type="tel" maxlength="10" placeholder="Ingrese un numero de celular" class="form-control" value="{{ Auth()->user()->celular }}" required/>
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
                        @switch(Auth()->user()->sexo)
                            @case('Hombre')
                            <option value="Hombre" selected>Hombre</option>
                            <option value="Mujer">Mujer</option>
                            @break
                            @case('Mujer')
                            <option value="Hombre">Hombre</option>
                            <option value="Mujer" selected>Mujer</option>
                            @break
                            @default
                            <option value="Hombre">Hombre</option>
                            <option value="Mujer">Mujer</option>
                        @endswitch
                        </select>
                        @error('sexo')
                        <small><span style="color: #d01414;">{{ $message }}</span></small>
                        @enderror
                </div>
                    <!------------------------------------------------------------------------------------------------->
                    @php
                      $roles =  \App\Models\Roles::all();
                    @endphp
                <div class="mb-4">
                    <label for="rol">Rol</label>
                    @can('loginAdministrador')
                        <p class="text-blck">Seleccione un tipo de usuario.</p>
                    @else
                        <p class="text-danger">Opción bloqueada para este usuario comuniquese con el administrador.</p>
                    @endcan
                    <select id="rol" name="rol" class="form-control" required @can('loginAdministrador')  @else disabled @endcan>
                        <option disabled>Seleccionar...</option>
                        @foreach($roles as $itemrol)
                            <option value="{{ $itemrol->id }}" @if( $itemrol->id ==  Auth()->user()->rol) selected @endif>
                                {{  $itemrol->nombre }}
                            </option>
                        @endforeach
                    </select>
                        @error('rol')
                        <small><span style="color: #d01414;">{{ $message }}</span></small>
                        @enderror
                    </div>
                    <!--------------------------------------------------------------------------------------------------------->
                <div class="mb-4">
                    <label for="status">Estatus</label>
                    @can('loginAdministrador')
                        <p class="text-blck">Seleccione el estado del usuario.</p>
                    @else
                        <p class="text-danger">Opción bloqueada para este usuario comuniquese con el administrador.</p>
                    @endcan
                    <select id="status" name="status" class="form-control" style="width: 49%" @can('loginAdministrador')  @else disabled @endcan>
                        <option disabled>Seleccionar...</option>
                        @switch(Auth()->user()->status)
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
                <!----------------------------------------------------------------------------------------------------->
                <div class="mb-4">
                    <hr/>
                    <button type="submit" class="btn btn-warning" style="flex: auto"><i
                            class="fas fa-save"></i> Modificar
                    </button>
                    @can('loginAdministrador')
                        <a class="btn-secondary btn" href="{{ route('usuario.index') }}"><i
                                class="fas fa-arrow-circle-left"></i> Regresar</a>
                    @elsecan('loginSecretaria')
                        <a class="btn-secondary btn" href="{{ route('home') }}"><i
                                class="fas fa-arrow-circle-left"></i> Regresar</a>
                    @endcan
                    </div>
            </form>
            <!--------------------------------------------------------------------------------------------------------->
            <h4>Actualizar contraseña</h4>
            <hr>
            <form action="{{ route('user-password.update') }}" method="post" id="actualizar_contraseña">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="current_password" class="form-label">{{ __('Contraseña actual') }}</label>
                    <input id="current_password" type="password" class="form-control @error('current_password', 'updatePassword') is-invalid @enderror" name="current_password" required>
                    @error('current_password', 'updatePassword')
                    <small><span style="color: #d01414;">{{ $message }}</span></small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password" class="form-label">{{ __('Nueva contraseña') }}</label>
                    <input id="password" type="password" class="form-control @error('password', 'updatePassword') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @error('password', 'updatePassword')
                    <small><span style="color: #d01414;">{{ $message }}</span></small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password-confirm" class="form-label">{{ __('Confirmar nueva contraseña') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    @error('password-confirm', 'updatePassword')
                    <small><span style="color: #d01414;">{{ $message }}</span></small>
                    @enderror
                </div>
                <br/>
                <div class="mb-4">
                    <button class="btn btn-dark" type="submit"><i class="fas fa-shield-alt"></i> {{ __('Actualizar contraseña') }}</button>
                </div>
            </form>
            <!--------------------------------------------------------------------------------------------------------->
            <h6>Eliminar perfil</h6>
            <hr/>
            <form action="{{ route('usuario.perfil.destroy', Auth()->user()->id) }}" method="post" id="borrar_datos">
                @csrf
                @method('delete')
                <div class="mb-4">
                    <button class="btn btn-danger"><i class="fas fa-trash"></i> Eliminar definitivamente</button>
                </div>
            </form>
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
                text: 'El usuario se registro correctamente',
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
                title: '¿Eliminar perfil del usuario?',
                text: "El perfil se borrara permanentemente y saldra de la sesion",
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
                text: 'Los datos del usuario se han actualizado correctamente',
                icon: 'success',
                confirmButtonColor: '#5dd91a',
                confirmButtonText: 'Aceptar'
            })
        </script>
    @endif


    <script>
        $('#actualizar_contraseña').submit(function (e) {
            e.preventDefault();

            Swal.fire({
                title: 'Contraseña',
                text: "¿Esta seguro de actualizar su contraseña",
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

    @if (session('status') == "password-updated")
        <script>
            Swal.fire({
                title: 'Contraseña',
                text: 'La contraseña se actualizo correctamente',
                icon: 'success',
                confirmButtonColor: '#5dd91a',
                confirmButtonText: 'Aceptar'
            })
        </script>
    @endif
@stop
