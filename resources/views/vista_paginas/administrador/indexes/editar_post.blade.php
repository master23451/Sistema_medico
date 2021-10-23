@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Mensajes</h1>
    <p>Edita ficha del post.</p>
@stop

@section('content')
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <!------------------------------------------------------------------------------------------------->
                    <form action="{{ route('administrador.actualizar.post', $dato_post->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="container">
                            <div class="row px-2 py-4">
                                <div class="col">
                                    <label for="titulo_post">Titulo</label>
                                    <input id="titulo_post" name="titulo_post" type="text" placeholder="Ingrese el titulo de su publicacion" class="form-control" value="{{ $dato_post->titulo }}"/>
                                </div>
                                <div class="col">
                                    <label for="fecha_publicacion">Fecha de publicacion</label>
                                    <input id="fecha_publicacion" name="fecha_publicacion" type="datetime-local"  class="form-control" value="{{ $dato_post->fecha_publicacion }}"/>
                                </div>
                            </div>
                            <!--------------------------------------------------------------------------------------------------------->
                            <div class="mb-4">
                                <label for="texto_descrip">Descripción</label>
                                <textarea id="texto_descrip" name="texto_descrip" type="text" placeholder="Ingrese una breve descripción" class="form-control">{{ $dato_post->mensaje }}</textarea>
                            </div>
                            <!-------------------------------Seleccion de fotos-------------------------------------------------------->
                            <div class="px-2 py-4">
                                <h5>Imagen del post</h5>
                                <div class="mb-2 mt-2">
                                    <button class="btn btn-secondary" id="btn_img_post" type="button"><i class="fas fa-portrait"></i> Elige una imagen</button>
                                    <input type="file" class="form-control"  id="img_post" name="img_post" style="display: none"/>
                                </div>
                                <div>
                                    <img
                                        src="{{ Illuminate\Support\Facades\Storage::url($dato_post->imagen) }}"
                                        alt="{{ $dato_post->titulo }}"
                                        style="width: 150px; height: 150px; margin-left: 25px;">
                                </div>
                            </div>
                            <!--------------------------------------------------------------------------------------------------------->
                            <!--------------------------------------------------------------------------------------------------------->
                            <div class="mb-4">
                                <hr/>
                                <button type="submit" class="btn btn-success" style="flex: auto"><i class="fas fa-save"></i> Publicar</button>
                                <a class="btn-secondary btn" href="{{ route('administrador.lista.post') }}"><i class="fas fa-arrow-circle-left"></i> Regresar</a>
                            </div>
                        </div>
                        <br>
                    </form>
                    <!------------------------------------------------------------------------------------------------->
                    <form action="{{ route('administrador.elimianr.post', $dato_post->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <div class="px-2 py-1">
                            <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                        </div>
                    </form>
                    <br/>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>

    <script type="text/javascript">
        const ImgAdminPost=document.getElementById('img_post');
        const ImgBtnAdminPost=document.getElementById('btn_img_post');

        ImgBtnAdminPost.addEventListener("click", function (){
            ImgAdminPost.click()
        });
    </script>
@stop
