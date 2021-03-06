@extends('adminlte::page')

@section('title', 'Usuarios')

@section('plugins.Datatables', true)

@section('content_header')
    <h1>Usuarios</h1>
    <p>Usuarios registrados en el sistema</p>
    <!----------------------------------------------------------------------------------------------------------------->
    <a class="btn btn-success" href="{{ route('usuario.create') }}"><i class="fa fa-plus"></i> Registrar a un nuevo usuario</a>
    <br/>
    <!----------------------------------------------------------------------------------------------------------------->
@stop

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive-xl">
                    <table class="table table-hover" id="tablaDatos">
                        <!----------------------------------------------------------------------------------------->
                        <thead class="thead-dark">
                        <tr style="text-align: center;">
                            <th scope="col">Codigo</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Usuario</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Rol</th>
                            <th scope="col">Estatus</th>
                            <th scope="col">Perfil</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($datos_usuario as $itemUsuarion)
                            <tr style="text-align: center;">
                                <td class="px-2 py-4">{{ $itemUsuarion->id  }}</td>
                                <td class="px-2 py-4">
                                    <img src=" @if($itemUsuarion -> profile_photo_path != '') {{ Illuminate\Support\Facades\Storage::url($itemUsuarion -> profile_photo_path) }}
                                    @else https://ui-avatars.com/api/?name={{$itemUsuarion->name}} @endif" alt="{{ $itemUsuarion -> nombre }}" style="border-radius: 100%; width: 50px; height: 50px; float: left">
                                    <div>{{ $itemUsuarion->name }}</div>
                                </td>
                                <td class="px-2 py-4">{{ $itemUsuarion->user }}</td>
                                <td class="px-2 py-4">{{ $itemUsuarion->email }}</td>
                                <td class="px-2 py-4"><span
                                        @switch($itemUsuarion->rol)
                                        @case(1)
                                        class="badge badge-warning"
                                        @break
                                        @case(2)
                                        class="badge badge-info"
                                        @break
                                        @case(3)
                                        class="badge badge-success"
                                        @break
                                        @case(4)
                                        class="badge badge-primary"
                                        @break
                                        @default
                                        class="badge badge-light"
                            @endswitch
                            >{{ $itemUsuarion->nombre_rol }}</span></td>
                                <td class="px-2 py-4">
                                    @switch($itemUsuarion->status)
                                        @case(1)
                                        <span class="badge badge-success">Activo</span>
                                        @break
                                        @case(0)
                                        <span class="badge badge-danger">Inactivo</span>
                                        @break
                                    @endswitch
                                </td>
                                <td class="px-2 py-4">
                                    @if($itemUsuarion->id != auth()->user()->id)
                                        <a class="btn btn-warning" href="{{ route('usuario.edit', $itemUsuarion->id) }}"><i class="fas fa-info-circle"></i> Info</a>
                                    @else
                                        <small><span class="badge badge-success">Logueado</span></small>
                                    @endif
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
                text: 'El usuario se elimino correctamente del sistema. Se le envio un correo al usuario.',
                icon: 'success',
                confirmButtonColor: '#d01414',
                confirmButtonText: 'Aceptar'
            })
        </script>
    @endif
@stop
