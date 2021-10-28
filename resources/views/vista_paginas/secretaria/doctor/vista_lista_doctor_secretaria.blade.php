@extends('adminlte::page')

@section('title', 'Doctorers || Secretaria')

@section('content_header')
    <h1>Doctores</h1>
    <p>Doctores registrados en el sistema.</p>
    <a class="btn btn-success" href="{{ route('secretaria.doctor.create') }}"><i class="fa fa-plus"></i> Registrar nuevo doctor</a>
    <br/>
@stop

@section('content')
   <div class="card">
       <div class="card-body">
           <!----------------------------------------------------------------------------------------------------------------->
           <div class="container-fluid">
               <table class="table table-striped" id="tablaDoctorSecretaria">
                   <!----------------------------------------------------------------------------------------->
                   <thead>
                   <tr style="text-align: center;">
                       <th scope="col">Codigo</th>
                       <th scope="col">Nombre</th>
                       <th scope="col">Usuario</th>
                       <th scope="col">E-mail</th>
                       <th scope="col">Especialidad</th>
                       <th scope="col">Estatus</th>
                       <th scope="col">Perfil</th>
                   </tr>
                   </thead>
                   <tbody>
                   @foreach ($listado_doctores as $datos_doctor)
                       <tr style="text-align: center;">
                           <td class="px-2 py-4">
                               <div>{{ $datos_doctor->id }}</div>
                           </td>
                           <td class="px-2 py-4">
                               <div>
                                   <div>
                                       <img src="{{ Illuminate\Support\Facades\Storage::url($datos_doctor->profile_photo_path) }}" alt="{{ $datos_doctor->nombre }}" style="border-radius: 100%; width: 50px; height: 50px; float: left">
                                   </div>
                                   <div>
                                       <div>{{ $datos_doctor->nombre }} {{ $datos_doctor->apellidos }}</div>
                                   </div>
                               </div>
                           </td>
                           <td class="px-2 py-4">{{ $datos_doctor->usuario }}</td>
                           <td class="px-2 py-4">{{ $datos_doctor->email }}</td>
                           <td class="px-2 py-4">{{ $datos_doctor->n_consultorio }}</td>
                           <td class="px-2 py-4">
                               @switch($datos_doctor->status)
                                   @case(1)
                                   <span style="color: #50c986">Activo</span>
                                   @break
                                   @case(0)
                                   <span style="color: #d01414">Inactivo</span>
                                   @break
                               @endswitch
                           </td>
                           <td class="px-2 py-4">
                               <a class="btn btn-warning" href="{{ route('secretaria.doctor.edit',  $datos_doctor->id) }}"><i class="fas fa-info-circle"></i> Info</a>
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
            $('#tablaDoctorSecretaria').DataTable();
        } );
    </script>
@stop
