@extends('adminlte::page')

@section('title', 'Admin || Post')

@section('content_header')
    <h1>Publicaciones</h1>
    <p>Vistra completa de la publicacion.</p>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="text-black">{{ $publicacion->titulo }}</h3>
        </div>
    </div>
    <hr>
    <div class="card">
        <div class="card-body">
            <div class="mb-4">
                <img src="{{ Illuminate\Support\Facades\Storage::url($publicacion->imagen) }}" class="img-fluid rounded-start" alt="..." style="height: 40rem; width: 100%">
            </div>
            <hr>
            <div>
                <p style="font-size: 20px">{{ $publicacion->mensaje }}</p>
            </div>
            <div class="mb-4">
                <small>Fceha de publicación: {{ $publicacion->updated_at }}</small>
            </div>
        </div>
        <div class="card-footer">
            <a class="btn btn-warning" href="{{ route('publicacion.edit', $publicacion->id) }}"><i class="fas fa-info-circle"></i> Editar</a>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
