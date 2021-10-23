@extends('adminlte::page')

@section('title', 'Admin || Post')

@section('content_header')
    <h1>Mensajes</h1>
    <p>Lista de mensajes del administrador.</p>
@stop

@section('content')
    <!----------------------------------------------------------------------------------------------------------------->
    <a class="btn btn-success" href="{{ route('administrador.crear.post') }}"><i class="fa fa-plus"></i> Registrar nuevo administrador</a>
    <br/>
    <br/>
    <div class="container">
        <table class="table table-striped" id="tablaPostAdmin">
            <!----------------------------------------------------------------------------------------->
            <thead>
            <tr style="text-align: center;">
                <th scope="col">Codigo</th>
                <th scope="col">Titulo</th>
                <th scope="col">Imagen</th>
                <th scope="col">fecha de publicacion</th>
                <th scope="col">Editar</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($lista_post as $lPost)
                <tr style="text-align: center;">
                    <td class="px-2 py-4"><div>{{ $lPost->id  }}</div></td>
                    <td class="px-2 py-4"><div>{{ $lPost->titulo }}</div></td>
                    <td class="px-2 py-4"><img src="{{ Illuminate\Support\Facades\Storage::url($lPost->imagen) }}" alt="{{ $lPost->titulo }}" style="width: 50px; height: 50px;"></td>
                    <td class="px-2 py-4"><div>{{ $lPost->fecha_publicacion }}</div></td>
                    <td class="px-2 py-4">
                        <a class="btn btn-warning" href="{{ route('administrador.editar.post', $lPost->id) }}"><i class="fas fa-info-circle"></i> Info</a>
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
            $('#tablaPostAdmin').DataTable();
        } );
    </script>
@stop
