@extends('adminlte::page')

@section('title', 'Pacientes || Admin')

@section('content_header')
    <h1>Pacientes</h1>
    <p>Pacientes registrados en el sistema.</p>
    <!--------------------------------------------------------------------------------------------->
    <a class="btn btn-success ml-3" href="{{ route('paciente.create') }}"><i class="fa fa-plus"></i> Registrar nuevo paciente</a>
    <br/>
    <!--------------------------------------------------------------------------------------------->
@stop

@section('content')
    <div class="container">
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
                            <span style="color: #d01414">Desactivado</span>
                            @break
                        @endswitch
                    </td>
                    <td class="px-2 py-4">
                        <a class="btn btn-warning" href="{{ route('paciente.edit', $lista_paciente->id) }}"><i class="fas fa-info-circle"></i> Info</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
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

    @if(session('eliminado')=='ok')
        <script>
            Swal.fire({
                title: 'Eliminado',
                text: 'El paciente se elimino de manera correcta del sistema',
                icon: 'success',
                confirmButtonColor: '#d01414',
                confirmButtonText: 'Aceptar'
            })
        </script>
    @endif
@stop
