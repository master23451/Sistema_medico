@extends('adminlte::page')

@section('title', 'Administradores')

@section('content_header')
    <h1>Lista de administradores</h1>
    <p>Administradores registrados en el sistema.</p>
    <!----------------------------------------------------------------------------------------------------------------->
    <a class="btn btn-success" href="{{ route('admin.create') }}"><i class="fa fa-plus"></i> Registrar nuevo administrador</a>
    <br/>
@stop

@section('content')

    <div class="container-fluid">
        <table class="table table-striped" id="tablaAdmin">
            <!----------------------------------------------------------------------------------------->
            <thead>
            <tr style="text-align: center;">
                <th scope="col">Codigo</th>
                <th scope="col">Nombre</th>
                <th scope="col">Usuario</th>
                <th scope="col">E-mail</th>
                <th scope="col">Perfil</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($datos_administradores as $datosAdmin)
                <tr style="text-align: center;">
                    <td class="px-2 py-4">
                        <div>{{ $datosAdmin->id  }}</div>
                    </td>
                    <td class="px-2 py-4">
                        <div>
                            <div>
                                <img src="{{ Illuminate\Support\Facades\Storage::url($datosAdmin->profile_photo_path) }}" alt="{{ $datosAdmin->nombre }}" style="border-radius: 100%; width: 50px; height: 50px; float: left">
                            </div>
                            <div>
                                <div>{{ $datosAdmin->nombre }} {{ $datosAdmin->apellidos }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-2 py-4">{{ $datosAdmin->usuario }}</td>
                    <td class="px-2 py-4">{{ $datosAdmin->email }}</td>
                    <td class="px-2 py-4">
                        <a class="btn btn-warning" href="{{ route('admin.edit', $datosAdmin->id) }}"><i class="fas fa-info-circle"></i> Info</a>
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
            $('#tablaAdmin').DataTable();
        } );
    </script>
@stop
