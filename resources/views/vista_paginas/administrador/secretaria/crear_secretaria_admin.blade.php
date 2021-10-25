@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Secretaria</h1>
    <p>Registrar a una nueva secretaria.</p>
@stop

@section('content')
   <div class="container-fluid">
       <!--------------------------------------------------------------------------------------------->
       <form action="{{ route('secretaria.store') }}" method="post" enctype="multipart/form-data">
           @csrf
               <!-----------------------Foto de perfil------------------------------------------------>
               <div class="px-2 py-4">
                   <h5>Foto de perfil</h5>
                   <div>
                       <img
                           src=""
                           alt="sin imagen"
                           style="border-radius: 100%; width: 150px; height: 150px; margin-left: 25px;">
                   </div>
                   <div class="mb-2 mt-2">
                       <button class="btn btn-secondary" type="button" id="btnSelectImgPerfil"><i class="fas fa-portrait"></i> Elige una foto de perfil</button>
                       <input type="file" class="form-control"  id="inputImgPerfil" name="inputImgPerfil" style="display: none;"/>
                   </div>
               </div>
               <!---------------------------------------------------------------------------------------------------->
               <div class="row">
                   <div class="col">
                       <label for="nombre">Nombre</label>
                       <input id="nombre" name="nombre" type="text" placeholder="Ingrese el nombre o los nombres del doctor" class="form-control"/>
                   </div>
                   <div class="col">
                       <label for="apellido">Apellidos</label>
                       <input id="apellido" name="apellido" type="text" placeholder="Ingrese los apellidos" class="form-control"/>
                   </div>
               </div>
               <!----------------------------------------------------------------------------------------------------->
               <br/>
               <div class="mb-4">
                   <label for="email">E-mail</label>
                   <input id="email" name="email" type="email" placeholder="Ingrese un correo electronico" class="form-control"/>
               </div>
               <!----------------------------------------------------------------------------------------------------->
               <div class="row">
                   <div class="col">
                       <label for="telefono">Numero de telefono</label>
                       <input id="telefono" name="telefono" type="tel" maxlength="10" placeholder="Ingrese un numero de telefono" class="form-control"/>
                   </div>
                   <div class="col">
                       <label for="celular">Numero de telefono</label>
                       <input id="celular" name="celular" type="tel" maxlength="10" placeholder="Ingrese un numero de telefono" class="form-control"/>
                   </div>
               </div>
               <!------------------------------------------------------------------------------------->
               <div class="mb-4">
                   <hr/>
                   <button type="submit" class="btn btn-success" style="flex: auto"><i class="fas fa-save"></i> Guardar</button>
                   <a class="btn-danger btn" href="{{ route('secretaria.index') }}"><i class="fas fa-arrow-circle-left"></i> Regresar</a>
               </div>
               <!------------------------------------------------------------------------------------->
       </form>
   </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script type="text/javascript">
        const inputImgPerfil=document.getElementById('inputImgPerfil');
        const btnSelectImgPerfil=document.getElementById('btnSelectImgPerfil');

        btnSelectImgPerfil.addEventListener("click", function (){
            inputImgPerfil.click()
        });
    </script>
@stop
