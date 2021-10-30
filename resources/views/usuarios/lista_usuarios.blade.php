@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1>Usuarios</h1>
    <p>Usuarios registrados en el sistema</p>
    <!----------------------------------------------------------------------------------------------------------------->
    <a class="btn btn-success" href="{{ route('usuario.create') }}"><i class="fa fa-plus"></i> Registrar a un nuevo usuario</a>
    <br/>
    <!----------------------------------------------------------------------------------------------------------------->
@stop

@section('content')
    <div class="card">
        <div class="container-fluid card-body">
            <table class="table table-striped" id="tablaUsuarios">
                <!----------------------------------------------------------------------------------------->
                <thead>
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
                @foreach ($datos_usuario as $itemUsuarion)
                    <tr style="text-align: center;">
                        <td class="px-2 py-4">
                            <div>{{ $itemUsuarion->id  }}</div>
                        </td>
                        <td class="px-2 py-4">
                            <div>
                                <div>
                                    <img src="{{ Illuminate\Support\Facades\Storage::url($itemUsuarion -> profile_photo_path) }}" alt="{{ $itemUsuarion -> nombre }}" style="border-radius: 100%; width: 50px; height: 50px; float: left">
                                </div>
                                <div>
                                    <div>{{ $itemUsuarion->name }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-2 py-4">{{ $itemUsuarion->user }}</td>
                        <td class="px-2 py-4">{{ $itemUsuarion->email }}</td>
                        <td class="px-2 py-4"><span style="color: #0a53be">{{ $itemUsuarion->nombre_rol }}</span></td>
                        <td class="px-2 py-4">
                            @switch($itemUsuarion->status)
                                @case(1)
                                <span style="color: #50c986">Activo</span>
                                @break
                                @case(0)
                                <span style="color: #d01414">Inactivo</span>
                                @break
                            @endswitch
                        </td>
                        <td class="px-2 py-4">
                            <a class="btn btn-warning" href="{{ route('usuario.edit', $itemUsuarion->id) }}"><i class="fas fa-info-circle"></i> Info</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        $(document).ready( function () {
            $('#tablaUsuarios').DataTable();
        } );
    </script>
@stop
