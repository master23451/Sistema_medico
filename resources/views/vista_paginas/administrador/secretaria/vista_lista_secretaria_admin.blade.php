@extends('adminlte::page')

@section('title', 'Secretarias || Administrador')

@section('content_header')
    <h1>Lista de secretaria</h1>
    <p>Secretarias registradas en el sistema.</p>
@stop

@section('content')
    <!--------------------------------------------------------------------------------------------->
    <a class="btn btn-success ml-3" href="{{ route('secretaria.create') }}"><i class="fa fa-plus"></i> Registrar nuevo paciente</a>
    <br/>
    <br>
    <!--------------------------------------------------------------------------------------------->
    <div class="container">
        <table class="table table-striped" id="tablaSecretariaAdmin">
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
            @foreach ($datos_Secretaria as $datosS)
                <tr style="text-align: center;">
                    <td class="px-2 py-4">
                        <div>{{ $datosS->id  }}</div>
                    </td>
                    <td class="px-2 py-4">
                        <div>
                            <div>
                                <img src="{{ Illuminate\Support\Facades\Storage::url($datosS->profile_photo_path) }}" alt="{{ $datosS->nombre }}" style="border-radius: 100%; width: 50px; height: 50px; float: left">
                            </div>
                            <div>
                                <div>{{ $datosS->nombre }} {{ $datosS->apellidos }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-2 py-4">{{ $datosS->usuario }}</td>
                    <td class="px-2 py-4">{{ $datosS->email }}</td>
                    <td class="px-2 py-4">
                        <a class="btn btn-warning" href="{{ route('secretaria.edit', $datosS->id) }}"><i class="fas fa-info-circle"></i> Info</a>
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
    <script> console.log('Hi!'); </script>

    <script>
        $(document).ready( function () {
            $('#tablaSecretariaAdmin').DataTable();
        } );
    </script>
@stop
