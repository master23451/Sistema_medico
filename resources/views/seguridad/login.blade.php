<!DOCTYPE html>
<html lang="es">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('bootstrap-5.1.1/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styleLogin.css') }}" id="{{ rand() }}">
</head>
<body style='background-image: url("{{ asset('img/banner-login.jpg') }}")'>
<div class="container">
    <div class="row justify-content-center pt-5 mt-5 mr-1">
        <div class="col-md-6 col-sm-8 col-xl-4 col-lg-4 formulario">
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="form-group text-center pt-3">
                    <img src="{{ asset('img/logo.jpg') }}" alt="logo" style="width: 40%">
                    <h1 class="text-black">Bienvenido</h1>
                </div>
                <div class="form-group mx-sm-4 pt-4">
                    <input name="email" id="email" type="text" autofocus value="" placeholder="Ingrese su correo electronico" class="form-control" required>
                    @error('email')<span style="color: #d01414"> {{$message}} </span>@enderror
                </div>
                <div class="form-group mx-sm-4 pt-4">
                    <input name="password" id="password" type="text" placeholder="Ingrese su contraseña" class="form-control" required>
                    @error('password')<span style="color: #d01414"> {{$message}} </span>@enderror
                </div>
                <div class="form-group mx-sm-4 pt-3">
                    <button  type="submit" class="btn btn-success">Ingresar</button>
                </div>
                <div class="form-group mx-sm-4 pt-3">
                    <input type="checkbox" name="recordar" id="recordar" class="checkbox_input" checked/>
                    <label for="recordar" class="checkbox_label">Recurda mi sesión</label>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
