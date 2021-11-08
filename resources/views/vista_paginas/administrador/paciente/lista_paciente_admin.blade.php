@extends('adminlte::page')

@section('title', 'Pacientes || Admin')

@section('plugins.Datatables', true)

@section('content_header')
    <h1>Pacientes</h1>
    <p>Pacientes registrados en el sistema.</p>
    <!--------------------------------------------------------------------------------------------->
    <a class="btn btn-success" href="{{ route('paciente.admin.create') }}"><i class="fa fa-plus"></i> Registrar nuevo paciente</a>
    <!--------------------------------------------------------------------------------------------->
@stop

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive-xl">
                <table class="table table-hover" id="tablaDatos">
                    <thead class="thead-dark">
                    <tr style="text-align: center;">
                        <th scope="col">Codigo</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Expediente</th>
                        <th scope="col">Estatus</th>
                        <th scope="col">Info</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($paciente as $itemPaciente)
                        <tr style="text-align: center;">
                            <td class="px-2 py-4">{{ $itemPaciente->id }}</td>
                            <td class="px-2 py-4">
                                <img src="@if($itemPaciente->profile_photo_path != '') {{ Illuminate\Support\Facades\Storage::url($itemPaciente->profile_photo_path) }} @else https://ui-avatars.com/api/?name={{ $itemPaciente->nombre }} @endif" alt="{{ $itemPaciente->nombre }}" style="border-radius: 100%; width: 50px; height: 50px; float: left">
                                <div>{{ $itemPaciente->nombre }} {{ $itemPaciente->apellido_P }} {{ $itemPaciente->apellido_M }}</div>
                            </td>
                            <td class="px-2 py-4">{{ $itemPaciente->email}}</td>
                            <td class="px-2 py-4">{{ $itemPaciente->expediente }}</td>
                            <td class="px-2 py-4">
                                @switch($itemPaciente->status)
                                    @case(1)
                                    <span class="badge badge-success">Activo</span>
                                    @break
                                    @case(0)
                                    <span class="badge badge-danger">Inactivo</span>
                                    @break
                                @endswitch
                            </td>
                            <td class="px-2 py-4">
                                <a class="btn btn-warning" href="{{ route('paciente.admin.edit', $itemPaciente->id) }}"><i class="fas fa-info-circle"></i> Info</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
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
            $('#tablaDatos').DataTable({
                language:{
                    sLengthMenu: "Mostrar _MENU_ Registros",
                    sZeroRecords:  "No se encontraron registros",
                    info: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
                    sInfoFiltered: "(Filtrado de un total de _MAX_ registros)",
                    sSearch: "Buscar:",
                    oPaginate: {
                        sFirst: "Primero",
                        sLast: "Ultimo",
                        sNext: "Siguiente",
                        sPrevious: "Anterior"
                    },
                    sProcessing: "Procesando",
                    responsive: true,
                }
            });
        });
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
