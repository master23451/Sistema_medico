@extends('adminlte::page')

@section('title', 'Paciente || Secretaria')

@section('plugins.Datatables', true)

@section('content_header')
    <h1>Pacientes</h1>
    <p>Pacientes registrados en el sistema.</p>
    <!--------------------------------------------------------------------------------------------->
    <a class="btn btn-success" href="{{ route('secretaria.paciente.create') }}"><i class="fa fa-plus"></i> Registrar nuevo paciente</a>
    <br/>
    <!--------------------------------------------------------------------------------------------->
@stop

@section('content')
  <div class="card">
      <div class="card-body">
          <div class="container-fluid">
              <table class="table table-striped" id="tablaPacienteAdmin">
                  <!----------------------------------------------------------------------------------------->
                  <thead>
                  <tr style="text-align: center;">
                      <th scope="col">Codigo</th>
                      <th scope="col">Nombre</th>
                      <th scope="col">Usuario</th>
                      <th scope="col">Expediente</th>
                      <th scope="col">Estatus</th>
                      <th scope="col">Perfil</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($datos_paciente as $lista_paciente)
                      <tr style="text-align: center;">
                          <td class="px-2 py-4">
                              <div>{{ $lista_paciente->id  }}</div>
                          </td>
                          <td class="px-2 py-4">
                              <div>
                                  <div>
                                      <img src="{{ Illuminate\Support\Facades\Storage::url($lista_paciente->profile_photo_path) }}" alt="{{ $lista_paciente->nombre }}" style="border-radius: 100%; width: 50px; height: 50px; float: left">
                                  </div>
                                  <div>
                                      <div>{{ $lista_paciente->nombre }} {{ $lista_paciente->apellidos }}</div>
                                  </div>
                              </div>
                          </td>
                          <td class="px-2 py-4">{{ $lista_paciente->usuario }}</td>
                          <td class="px-2 py-4">{{ $lista_paciente->expediente }}</td>
                          <td class="px-2 py-4">
                              @switch($lista_paciente->status)
                                  @case(1)
                                  <span style="color: #50c986">Activo</span>
                                  @break
                                  @case(0)
                                  <span style="color: #d01414">Inactivo</span>
                                  @break
                              @endswitch
                          </td>
                          <td class="px-2 py-4">
                              <a class="btn btn-warning" href="{{ route('secretaria.paciente.edit', $lista_paciente->id) }}"><i class="fas fa-info-circle"></i> Info</a>
                          </td>
                      </tr>
                  @endforeach
                  </tbody>
              </table>
          </div>
      </div>
  </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        $(document).ready( function () {
            $('#tablaPacienteAdmin').DataTable();
        } );
    </script>
@stop
