@extends('adminlte::page')

@section('title', 'Doctores || Admin')

@section('plugins.Datatables', true)

@section('content_header')
    <h1>Lista de doctores</h1>
    <p>Doctores registrados en el sistema.</p>
    <!----------------------------------------------------------------------------------------------------------------->
    <a class="btn btn-success" href="{{ route('doctor.admin.create') }}"><i class="fa fa-plus"></i> Registrar nuevo doctor</a>
    <br/>
    <!----------------------------------------------------------------------------------------------------------------->
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
                        <th scope="col">Especialidad</th>
                        <th scope="col">Estatus</th>
                        <th scope="col">Info</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($datosDoctores as $itemDoctor)
                        <tr style="text-align: center;">
                            <td class="px-2 py-4"><div>{{ $itemDoctor->id }}</div></td>
                            <td class="px-2 py-4">
                                <div>
                                    @if($itemDoctor->profile_photo_path != '')
                                        <div>
                                            <img src="{{ Illuminate\Support\Facades\Storage::url($itemDoctor->profile_photo_path) }}" alt="{{ $itemDoctor->nombre }}" style="border-radius: 100%; width: 50px; height: 50px; float: left">
                                        </div>
                                    @else
                                        <div>
                                            <img src="https://ui-avatars.com/api/?name={{ $itemDoctor->nombre }}" alt="{{ $itemDoctor->nombre }}" style="border-radius: 100%; width: 50px; height: 50px; float: left">
                                        </div>
                                    @endif
                                    <div>
                                        <div>{{ $itemDoctor->nombre }} {{ $itemDoctor->apellido_P }} {{ $itemDoctor->apellido_M }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-2 py-4">{{ $itemDoctor->email }}</td>
                            <td class="px-2 py-4">{{ $itemDoctor->n_consultorio }}</td>
                            <td class="px-2 py-4">
                                @switch($itemDoctor->status)
                                    @case(1)
                                    <span class="badge badge-success">Activo</span>
                                    @break
                                    @case(0)
                                    <span class="badge badge-danger">Inactivo</span>
                                    @break
                                @endswitch
                            </td>
                            <td class="px-2 py-4">
                                <a class="btn btn-warning" href="{{ route('doctor.admin.edit',  $itemDoctor->id) }}"><i class="fas fa-info-circle"></i> Info</a>
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
                text: 'El doctor se elimino de manera correcta del sistema',
                icon: 'success',
                confirmButtonColor: '#d01414',
                confirmButtonText: 'Aceptar'
            })
        </script>
    @endif
@stop
