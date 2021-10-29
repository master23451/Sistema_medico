@extends('adminlte::page')

@section('title', 'Editar post || Admin')

@section('content_header')
    <h1>Post</h1>
    <p>Edita informacion de post.</p>
@stop

@section('content')
 <div class="card">
     <div class="card-body">
         <div class="container-fluid">
             <!------------------------------------------------------------------------------------------------->
             <form action="{{ route('administrador.actualizar.post', $dato_post->id) }}" method="post" enctype="multipart/form-data">
                 @csrf
                 @method('put')
                 <h4>Cuerpo del post</h4>
                 <hr>
                 <div class="row">
                     <div class="col">
                         <label for="titulo_post">Titulo</label>
                         <input id="titulo_post" name="titulo_post" type="text" placeholder="Ingrese el titulo de su publicacion" class="form-control" value="{{ $dato_post->titulo }}"/>
                     </div>
                     <div class="col">
                         <label for="fecha_publicacion">Fecha de publicacion</label>
                         <input id="fecha_publicacion" name="fecha_publicacion" type="date"  class="form-control" dataformatas="yyyy-MM-ddThh:mm" value="{{ $dato_post->fecha_publicacion }}"/>
                     </div>
                 </div>
                 <!--------------------------------------------------------------------------------------------------------->
                 <br>
                 <div class="mb-4">
                     <label for="texto_descrip">Descripción</label>
                     <textarea id="texto_descrip" name="texto_descrip" type="text" placeholder="Ingrese una breve descripción" class="form-control" style="height: 200px">{{ $dato_post->mensaje }}</textarea>
                 </div>
                 <!-------------------------------Seleccion de fotos-------------------------------------------------------->
                 <div class="mb-4">
                     <h5>Imagen del post</h5>
                     <div class="mb-2 mt-2">
                         <button class="btn btn-secondary" id="btnImgPost" type="button"><i class="fas fa-portrait"></i> Elige una imagen</button>
                         <input type="file" class="form-control"  id="inputImgPost" name="img_post" style="display: none"/>
                     </div>
                     <div>
                         <img
                             src="{{ Illuminate\Support\Facades\Storage::url($dato_post->imagen) }}"
                             alt="{{ $dato_post->titulo }}"
                             style="width: 350px; height: 200px; margin-left: 25px"
                             id="imgpreview"
                         >
                     </div>
                 </div>
                 <!--------------------------------------------------------------------------------------------------------->
                 <!--------------------------------------------------------------------------------------------------------->
                 <div class="mb-4">
                     <hr/>
                     <button type="submit" class="btn btn-success" style="flex: auto"><i class="fas fa-save"></i> Publicar</button>
                     <a class="btn-secondary btn" href="{{ route('administrador.lista.post') }}"><i class="fas fa-arrow-circle-left"></i> Regresar</a>
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
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script type="text/javascript">
        const inputImgPost=document.getElementById('inputImgPost');
        const btnImgPost=document.getElementById('btnImgPost');

        btnImgPost.addEventListener("click", function (){
            inputImgPost.click()
        });
    </script>

    <script type="text/javascript">
        function readImage (input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#imgpreview').attr('src', e.target.result); // Renderizamos la imagen
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#inputImgPost").change(function () {
            // Código a ejecutar cuando se detecta un cambio de archivO
            readImage(this);
        });
    </script>

@stop
