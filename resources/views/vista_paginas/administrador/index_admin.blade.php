@extends('adminlte::page')

@section('title', 'Pagina principal')

@section('content_header')
<div class="card">
    <div class="card-header">
        <h2>Panel de control</h2>
    </div>
</div>
@stop

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2>Mensajes del administrador</h2>
        </div>
    </div>
    <div class="card mb-3" style="max-width: 100%;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{ Illuminate\Support\Facades\Storage::url($ver_post->imagen) }}" class="img-fluid rounded-start" alt="..." style="height: 100%">
            </div>
            <div class="card-body">
                <h3 class="text-black">{{ $ver_post->titulo }}</h3>
                <hr/>
                <p class="card-text">{{ $ver_post->mensaje }}</p>
                <p class="card-text"><small class="text-muted">{{ $ver_post->updated_at }}</small></p>
            </div>
        </div>
    </div>
    <br>
    <div class="mb-4">
        <div class="card">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <h4 class="text-right">Fecha y hora</h4>
                <hr>
                <p class="text-right" style="font-size: 24px">{{ date('d-m-y H:i:s') }}</p>
            </div>
            <div class="card-footer">
                <small><a href="#"><i class="fas fa-calendar"></i> Hora y fecha</a></small>
            </div>
        </div>
    </div>
    <div class="mb-4">
        <div class="card">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <h4 class="text-right">Citas totales</h4>
                <hr>
                <p class="text-right"></p>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col">
            <div class="card">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h4 class="text-right">Pacientes registrados</h4>
                    <hr>
                    @foreach($contador_Paciente as $contPaciente)
                        <p class="text-right" style="font-size: 24px">{{ $contPaciente->pacientes }}</p>
                    @endforeach
                </div>
                <div class="card-footer">
                    <small><a href="#"><i class="fas fa-procedures"></i> Pacientes registrados</a></small>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                    <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h4 class="text-right">Medicos registrados</h4>
                    <hr>
                    @foreach($contador_doctor as $contDoctores)
                        <p class="text-right" style="font-size: 24px">{{ $contDoctores->doctores }}</p>
                    @endforeach
                </div>
                <div class="card-footer">
                    <small><a href="#"><i class="fas fa-user-md"></i> Medicos registrados</a></small>
                </div>
            </div>
        </div>
    </div>
   <div class="mb-4">
       <div class="card">
           <img src="..." class="card-img-top" alt="...">
           <div class="card-body">
               <h4 class="text-right">Especialidades</h4>
               <hr>
               <p class="text-right"></p>
           </div>
           <div class="card-footer">
               <small><a href="#"><i class="fas fa-briefcase-medical"></i> Especialidades</a></small>
           </div>
       </div>
   </div>
</div>
@stop

@section('footer')

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
