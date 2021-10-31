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
            <form action="{{ route('password.email') }}" method="post">
                @csrf
                <div class="form-group text-center pt-3">
                    <img src="{{ asset('img/logo.jpg') }}" alt="logo" style="width: 40%">
                    <h1 class="text-black">Bienvenido</h1>
                    <h5 class="text-black">Restablecer contraseña</h5>
                </div>
                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="form-group mx-sm-4 pt-4">
                    <input name="email" id="email" type="email" autofocus value="{{ old('email') }}" placeholder="Ingrese su correo electronico" class="form-control" required>
                    @error('email')<span style="color: #d01414"> {{$message}} </span>@enderror
                </div>
                <div class="form-group mx-sm-4 pt-3">
                    <button  type="submit" class="btn btn-danger" style="width: 65%">Restablecer contraseña</button>
                </div>
                <hr>
                <div class="form-group mx-sm-4 pt-3">
                    <a href="{{ 'login' }}" class="btn btn-secondary">Regresar al login</a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
