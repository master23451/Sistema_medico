@extends('adminlte::page')

@section('title', 'Consultorios')

@section('content_header')
    <h1>Consultorio</h1>
    <p>Complete la informacion de manera correcta.</p>
@stop

@section('content')
    <div class="container-fluid">
        <div class="card">
           <div class="card-body">
               <div class="mb-4">
                   <label for ="Nombre">{{ 'Nombre' }}</label>
                   <input type="text" name="Nombre" id="Nombre" value="{{ isset ($consultorio->nombre)?$consultorio->nombre:'' }}" class="form-control">
               </div>
               <div class="mb-4">
                   <hr/>
                   <input type="submit" value="{{ $Modo=='crear' ? 'Agregar ' : 'Modificar '}}" class="btn btn-success">
                   <a href="{{ route('consultorios.index') }}" class="btn btn-secondary">Regresar</a>
               </div>
           </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
