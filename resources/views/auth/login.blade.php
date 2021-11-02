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
                    @if (session('status'))
                        <div class="text-success">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <div class="form-group mx-sm-4 pt-4">
                    <input name="email" id="email" type="email" autofocus value="{{ old('email') }}" placeholder="Ingrese su correo electronico" class="form-control" required>
                    @error('email')<span style="color: #d01414"> {{$message}} </span>@enderror
                </div>
                <div class="form-group mx-sm-4 pt-4">
                    <input name="password" id="password" type="password" placeholder="Ingrese su contraseña" class="form-control" required>
                    @error('password')<span style="color: #d01414"> {{$message}} </span>@enderror
                </div>
                <div class="form-group mx-sm-4 pt-4">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Recuerdame') }}
                        <span class="form-check-sign"><span class="check"></span></span>
                    </label>
                </div>
                <div class="form-group mx-sm-4 pt-3">
                    <button  type="submit" class="btn btn-success" style="width: 65%">Entrar</button>
                </div>
                <hr>
                <div class="form-group mx-sm-4 pt-3">
                    <a  href="{{ route('register') }}" class="btn btn-secondary" style="width: 37%">Registrarse</a>
                    <a href="{{ route('password.request') }}" style="padding-left: 5px; text-decoration: none; color: #000000">¿Ustes olvido su contraseña?</a>
                </div>
            </form>
        </div>
    </div>
</div>
<br/>
@if(session('eliminado')=='ok')
    <div class="alert alert-success" role="alert">{{ __('Usuario eliminado correctamente') }}</div>
@endif
</body>
</html>
