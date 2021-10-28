@extends('adminlte::page')

@section('title', 'Admin || Post')

@section('content_header')
    <h1>Mensajes</h1>
    <p>Vista de los mensajes.</p>
@stop

@section('content')
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{ Illuminate\Support\Facades\Storage::url($ver_post->imagen) }}" class="img-fluid rounded-start" alt="..." style="height: 100%">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h3 class="text-black">{{ $ver_post->titulo }}</h3>
                    <hr/>
                    <p class="card-text">{{ $ver_post->mensaje }}</p>
                    <p class="card-text"><small class="text-muted">{{ $ver_post->updated_at }}</small></p>
                    <a class="btn btn-warning" href="{{ route('administrador.editar.post', $ver_post->id) }}"><i class="fas fa-info-circle"></i> Editar</a>
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
