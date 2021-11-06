@extends('adminlte::page')

@section('title', 'Publicaciones')

@section('plugins.Datatables', true)

@section('content_header')
    <h1>Publicaciónes</h1>
    <p>Lista de publicaciones hechas por administradores.</p>
    <!----------------------------------------------------------------------------------------------------------------->
    <a class="btn btn-success" href="{{ route('publicacion.create') }}"><i class="fa fa-plus"></i> Crear nueva publicación</a>
    <br/>
    <!----------------------------------------------------------------------------------------------------------------->
@stop

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body table-responsive-xl">
            <table class="table table-hover" id="tablaDatos">
                <!----------------------------------------------------------------------------------------->
                <thead class="thead-dark">
                <tr style="text-align: center;">
                    <th scope="col">Codigo</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Fecha de publicacion</th>
                    <th scope="col">Fecha de modificación</th>
                    <th scope="col">Controles</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($publicaciones as $item)
                    <tr style="text-align: center;">
                        <td class="px-2 py-4"><div>{{ $item->id  }}</div></td>
                        <td class="px-2 py-4"><div>{{ $item->titulo }}</div></td>
                        <td class="px-2 py-4"><img src="{{ Illuminate\Support\Facades\Storage::url($item->imagen) }}" alt="{{ $item->titulo }}" style="width: 50px; height: 50px;"></td>
                        <td class="px-2 py-4"><div>{{ $item->created_at }}</div></td>
                        <td class="px-2 py-4"><div>{{ $item->updated_at }}</div></td>
                        <td class="px-2 py-4">
                            <a class="btn btn-success" href="{{ route('publicacion.show', $item->id) }}"><i class="fas fa-eye"></i> Ver</a>
                            <a class="btn btn-warning" href="{{ route('publicacion.edit', $item->id) }}"><i class="fas fa-info-circle"></i> Info</a>
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
            $('#tablaDatos').DataTable({
                responsive: true,
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
                }
            });
        });
    </script>
@stop
