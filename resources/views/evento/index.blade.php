@extends('adminlte::page')

@section('title', 'Crear nuevo doctor || Admin')
@section('plugins.Datatables', true)
@section('content_header')
    <h1>Citas</h1>
    <p>Complete la informacion de manera correcta.</p>
@stop

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div id="agenda"></div>
            <!-- Modal -->
            <div class="modal fade" id="evento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Datos de la Cita</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" id="formCita">
                                {!! csrf_field() !!}
                                <div class="form-group">
                                    <label for="id">ID</label>
                                    <input type="text" disabled="disabled" class="form-control" name="id" id="id" aria-describedby="helpId" placeholder="Este campo se llena automáticamente">

                                </div>

                                <div class="form-group">
                                    <label for="title">Título</label>
                                    <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId" placeholder="Escribir Título de la Cíta">

                                </div>

                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Nombres del Paciente">

                                </div>

                                <div class="form-group">
                                    <label for="apellidos">Apellidos</label>
                                    <input type="text" class="form-control" name="apellidos" id="apellidos" aria-describedby="helpId" placeholder="Apellidos del Paciente">

                                </div>

                                <div class="form-group">
                                    <label for="documento">Documento</label>
                                    <input type="text" class="form-control" name="documento" id="documento" aria-describedby="helpId" placeholder="Documento / Folio de la Cita">

                                </div>

                                <div class="form-group">
                                    <label for="start">Inicio</label>
                                    <input type="date" class="form-control" name="start" id="start" aria-describedby="helpId" placeholder="">
                                    <small id="helpId" class="form-text text-muted">FECHA EN QUE INICIA LA CITA</small>
                                </div>

                                <div class="form-group">
                                    <label for="end">Fin</label>
                                    <input type="date" class="form-control" name="end" id="end" aria-describedby="helpId" placeholder="">
                                    <small id="helpId" class="form-text text-muted">FECHA EN QUE TERMINA LA CITA</small>
                                </div>

                            </form>

                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-success" id="btnGuardar">Guardar</button>
                            <button type="button" class="btn btn-warning" id="btnModificar">Modificar</button>
                            <button type="button" class="btn btn-danger" id="btnEliminar">Eliminar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/main.css">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/locales-all.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script type="text/javascript" >
        var baseURL={!! json_encode(url('/')) !!}
    </script>

    <script type="text/javascript" src="{{ asset('js/agenda.js') }}" defer></script>

@stop
