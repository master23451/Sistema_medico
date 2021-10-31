<!DOCTYPE html>
<html lang="es">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrarse</title>
    <link rel="stylesheet" href="{{ asset('bootstrap-5.1.1/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styleLogin.css') }}" id="{{ rand() }}">

</head>
<body style='background-image: url("{{ asset('img/banner-login.jpg') }}")'>
<div class="container">
    <div class="row justify-content-center pt-5 mt-5 mr-1">
        <div class="col-md-6 col-sm-8 col-xl-4 col-lg-4 formulario">
            <form action="{{ route('register') }}" method="post">
                @csrf
                <div class="form-group text-center pt-3">
                    <img src="{{ asset('img/logo.jpg') }}" alt="logo" style="width: 40%">
                    <h1 class="text-black">Bienvenido</h1>
                </div>
                <div class="form-group mx-sm-4 pt-4">
                    <input name="name" id="name" type="name" autofocus value="{{ old('name') }}" placeholder="Ingrese un nombre nombre" class="form-control" required>
                    @error('name')<span style="color: #d01414"> {{$message}} </span>@enderror
                </div>
                <div class="form-group mx-sm-4 pt-4">
                    <input name="email" id="email" type="email" autofocus value="{{ old('email') }}" placeholder="Ingrese su correo electronico" class="form-control" required>
                    @error('email')<span style="color: #d01414"> {{$message}} </span>@enderror
                </div>
                <div class="form-group mx-sm-4 pt-4">
                    <input name="password" id="password" type="text" placeholder="Ingrese una contraseña" class="form-control" required>
                    @error('password')<span style="color: #d01414"> {{$message}} </span>@enderror
                </div>
                <div class="form-group mx-sm-4 pt-4">
                    <input name="password_confirmation" id="password_confirmation" type="text" placeholder="Confirme su contraseña" class="form-control" required>
                    @error('password_confirmation')<span style="color: #d01414"> {{$message}} </span>@enderror
                </div>
                <div class="form-group mx-sm-4 pt-3">
                    <button  type="submit" class="btn btn-secondary" style="width: 35%">Registrarse</button>
                    <a href="{{ 'login' }}" style="padding-left: 10px; text-decoration: none; color: #000000">¿Usted ya tiene una cuenta?</a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
