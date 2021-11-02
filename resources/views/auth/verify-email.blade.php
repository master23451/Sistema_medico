<!DOCTYPE html>
<html lang="es">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Restablecer contraseña</title>
    <link rel="stylesheet" href="{{ asset('bootstrap-5.1.1/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styleLogin.css') }}" id="{{ rand() }}">

</head>
<body style='background-image: url("{{ asset('img/banner-login.jpg') }}")'>
<div class="container">
    <div class="row justify-content-center pt-5 mt-5 mr-1">
        <div class="col-md-6 col-sm-8 col-xl-4 col-lg-4 formulario">
            <div class="form-group text-center pt-3">
                <img src="{{ asset('img/logo.jpg') }}" alt="logo" style="width: 40%">
                <h1 class="text-black">Bienvenido</h1>
                <h5 class="text-black">Verificacion de correo</h5>
            </div>
            <div class="text-success">
                {{ __('Gracias por registrarse antes de ingresar se le solicita que verifique su correo electronico  en
                       caso de que no a resivdo su correo electronico se le solicita que presiona el boton de abajo para volver a enviarlo') }}
            </div>
            <form action="{{ route('verification.send') }}" method="post">
                @csrf
                <div class="form-group mx-sm-4 pt-3">
                    <button id="btnsubmit" type="submit" class="btn btn-danger" style="width: 65%">Re-enviar correo</button>
                </div>
                <br>
                @if (session('status'))
                    <div class="text-success">
                        {{ __('Se re-envio el correo de veridicacion: ') }}
                        <small class="text-warning">{{ session('status') }}</small>
                    </div>
                @endif
            </form>
        </div>
    </div>
</div>
</body>
</html>
