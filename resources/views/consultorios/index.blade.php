@extends('adminlte::page')

@section('title', 'consultorios')

@section('plugins.Datatables', true)

@section('content_header')
    <h1>Consultorios</h1>
    <p>Consultorios registrados en el sistema</p>
    <!----------------------------------------------------------------------------------------------------------------->
    <a class="btn btn-success" href="{{ url('consultorios/create') }}"><i class="fa fa-plus"></i> Registrar a un nuevo consultorio</a>
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
                            <th scope="col">Estatus</th>
                            <th scope="col">Acción</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($datos as $consultorio)
                            <tr style="text-align: center;">
                                <td class="px-2 py-4">{{ $consultorio->id}}</td>
                                <td class="px-2 py-4">{{ $consultorio->nombre}}</td>
                                <td class="px-2 py-4">{{ $consultorio->nombre}}</td>
                                <td class="px-2 py-4"><a href="{{ url('/consultorios/' . $consultorio->id . '/edit')}}" class="btn btn-warning">Editar</a>
                                    <form method="post" action="{{ url('/consultorios/'. $consultorio->id) }}">
                                        {{csrf_field() }}
                                        {{method_field('DELETE') }}
                                        <button type="submit" onclick="return confirm ('¿Borrar?')" class="btn btn-danger">Borrar</button>
                                    </form>
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

