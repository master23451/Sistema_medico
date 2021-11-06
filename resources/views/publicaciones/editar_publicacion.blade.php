@extends('adminlte::page')

@section('title', 'Editar publicación')

@section('content_header')
    <h1>Publicacion</h1>
    <p>Edita la información de la publicacion.</p>
@stop

@section('content')
 <div class="container-fluid">
     <div class="card">
         <div class="card-body">
             <h4>Cuerpo de la publicación</h4>
             <hr>
             <!------------------------------------------------------------------------------------------------->
             <form action="{{ route('publicacion.update', $publicacion->id) }}" method="post" enctype="multipart/form-data">
                 @csrf
                 @method('put')
                 <div class="mb-4">
                     <label for="titulo">Titulo</label>
                     <input id="titulo" name="titulo" type="text" placeholder="Edite el titulo de la publicacion" class="form-control" value="{{ $publicacion->titulo }}"/>
                 </div>
                 <!--------------------------------------------------------------------------------------------------------->
                 <div class="mb-4">
                     <label for="mensjae">Descripción</label>
                     <textarea id="mensjae" name="mensjae" type="text" placeholder="Modifique el texto del mensaje" class="form-control" style="height: 200px">{{ $publicacion->mensaje }}</textarea>
                 </div>
                 <!-------------------------------Seleccion de fotos-------------------------------------------------------->
                 <div class="mb-4">
                     <h5>Imagen del post</h5>
                     <div class="mb-2 mt-2">
                         <button class="btn btn-secondary" id="btnImgPublicacion" type="button"><i class="fas fa-portrait"></i> Elige una imagen</button>
                         <input type="file" class="form-control"  id="inputImgPublicacion" name="inputImgPublicacion" style="display: none" accept="image/*"/>
                     </div>
                     <div>
                         @if(Illuminate\Support\Facades\Storage::url($publicacion->imagen) != '')
                             <img src="{{ Illuminate\Support\Facades\Storage::url($publicacion->imagen) }}" class="img-fluid" id="imgpreview" alt="">
                         @else
                             <span class="badge badge-danger">No existe ninguna imagen en la publicación</span>
                         @endif
                     </div>
                 </div>
                 <!--------------------------------------------------------------------------------------------------------->
                 <div class="mb-4">
                     <hr/>
                     <button type="submit" class="btn btn-warning"><i class="fas fa-save"></i> Modificar</button>
                     <a class="btn-secondary btn" href="{{ route('publicacion.index') }}"><i class="fas fa-arrow-circle-left"></i> Regresar</a>
                 </div>
                 <br>
             </form>
             <!------------------------------------------------------------------------------------------------->
             <h6>Eliminar publicación</h6>
             <hr/>
             <form action="{{ route('publicacion.destroy', $publicacion->id) }}" method="post">
                 @csrf
                 @method('delete')
                 <div class="mb-4">
                     <button class="btn btn-danger"><i class="fas fa-trash"></i> Eliminar definitivamente</button>
                 </div>
             </form>
         </div>
     </div>
 </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script type="text/javascript">
        const inputImgPublicacion=document.getElementById('inputImgPublicacion');
        const btnImgPublicacion=document.getElementById('btnImgPublicacion');

        btnImgPublicacion.addEventListener("click", function (){
            inputImgPublicacion.click()
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

        $("#inputImgPublicacion").change(function () {
            // Código a ejecutar cuando se detecta un cambio de archivO
            readImage(this);
        });
    </script>

@stop
