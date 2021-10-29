@extends('adminlte::page')

@section('title', 'Crear nuevo doctor || Admin')

@section('content_header')
    <h1>Registra a nuevo doctor en el sistema</h1>
    <p>Complete la informacion de manera correcta.</p>
@stop

@section('content')
  <div class="card">
      <div class="card-body">
          <h4>Datos personales</h4>
          <hr>
          <!------------------------------------------------------------------------------------------------->
          <div class="container-fluid">
              <form action="{{ route('doctor.store') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <!-------------------------------Seleccion de fotos-------------------------------------------------------->
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
                          <button class="btn btn-secondary" id="btnSelectImgPerfil" type="button"><i class="fas fa-portrait"></i>
                              Elige una foto de perfil
                          </button>
                          <input type="file" class="form-control" id="inputImgPerfil" name="inputImgPerfil"
                                 style="display: none" accept="image/*"/>
                      </div>
                      @error('inputImgPerfil')
                      <small><span style="color: #d01414;">{{ $message }}</span></small>
                      @enderror
                  </div>
                  <!--------------------------------------------------------------------------------------------------------->
                  <div class="row">
                      <div class="col">
                          <label for="nombre">Nombre</label>
                          <input id="nombre" name="nombre" type="text"
                                 placeholder="Ingrese el nombre o los nombres del doctor" class="form-control" required/>
                          @error('nombre')
                          <small><span style="color: #d01414;">{{ $message }}</span></small>
                          @enderror
                      </div>
                      <div class="col">
                          <label for="apellido">Apellidos</label>
                          <input id="apellido" name="apellido" type="text" placeholder="Ingrese los apellidos"
                                 class="form-control" required/>
                          @error('apellido')
                          <small><span style="color: #d01414;">{{ $message }}</span></small>
                          @enderror
                      </div>
                      <div class="col">
                          <label for="email">E-mail</label>
                          <input id="email" name="email" type="email" placeholder="Ingrese un correo electronico"
                                 class="form-control" required/>

                          @error('email')
                          <small><span style="color: #d01414;">{{ $message }}</span></small>
                          @enderror
                      </div>
                  </div>
                  <!--------------------------------------------------------------------------------------------------------->
                  <br/>
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
                  <br>
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
                  <!----------------------------------------------------------------------------------------->
                      <h5>Datos laborales</h5>
                      <hr>
                  <div class="row">
                      <div class="col">
                          <label for="consultorio">Especialidad</label>
                          <select id="consultorio" name="consultorio" class="form-control" required>
                              <option value="">Seleccionar...</option>
                              @foreach($consultorios as $item_consultorio)
                                  <option value="{{ $item_consultorio->id }}">{{ $item_consultorio->nombre }}</option>
                              @endforeach
                          </select>
                          @error('consultorio')
                          <small><span style="color: #d01414;">{{ $message }}</span></small>
                          @enderror
                      </div>
                      <!----------------Horarios------------------------------------>
                      <div class=col>
                          <label for="horarios">Horario de trabajo</label>
                          <input id="horarios" name="horarios" type="time" class="form-control"/>
                      </div>
                  </div>
                  <!--------------------------------------------------------------------------------------------------------->
                  <div class="mb-4">
                      <hr/>
                      <button type="submit" class="btn btn-success" style="flex: auto"><i class="fas fa-save"></i> Guardar
                      </button>
                      <a class="btn-danger btn" href="{{ route('doctor.index') }}"><i class="fas fa-arrow-circle-left"></i>
                          Regresar</a>
                  </div>
              </form>
          </div>
          <br>
          <!------------------------------------------------------------------------------------------------->
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
