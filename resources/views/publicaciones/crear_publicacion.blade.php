@extends('adminlte::page')

@section('title', 'Crear nuevo publicaciones')

@section('content_header')
    <h1>Publicaciones</h1>
    <p>Crear una publicacón general.</p>
@stop

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <!------------------------------------------------------------------------------------------------->
            <form action="{{ route('publicacion.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <h4>Cuerpo de la publicación</h4>
                <hr>
                <div class="mb-4">
                    <label for="titulo">Titulo</label>
                    <input id="titulo" name="titulo" type="text" placeholder="Ingrese el titulo de su publicacion" class="form-control"/>
                </div>
                <!--------------------------------------------------------------------------------------------------------->
                <div class="mb-4">
                    <label for="mensjae">Descripción</label>
                    <textarea id="mensjae" name="mensjae" type="text" placeholder="Ingrese una breve descripción" class="form-control" style="height: 200px"></textarea>
                </div>
                <!-------------------------------Seleccion de fotos-------------------------------------------------------->
                <div class="mb-4">
                    <h5>Imagen del post</h5>
                    <div class="mb-2 mt-2">
                        <button class="btn btn-secondary" id="btnImgPublicacion" type="button"><i class="fas fa-portrait"></i> Elige una imagen</button>
                        <input type="file" class="form-control"  id="inputImgPublicacion" name="inputImgPublicacion" style="display: none" accept="image/*"/>
                    </div>
                    <div>
                        <img src="..." class="img-fluid" id="imgpreview" alt="">
                    </div>
                </div>
                <!--------------------------------------------------------------------------------------------------------->
                <hr/>
                <div class="mb-4">
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Publicar</button>
                    <a class="btn-danger btn" href="{{ route('publicacion.index') }}"><i class="fas fa-arrow-circle-left"></i> Regresar</a>
                </div>
            </form>
            <!------------------------------------------------------------------------------------------------->
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
