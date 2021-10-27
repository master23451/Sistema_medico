<!DOCTYPE html>
<html lang="es">
<head>
    <title>Login</title>

    <link rel="stylesheet" href="{{ asset('bootstrap-5.1.1/css/bootstrap.css') }}">
</head>
<body>
<div class="container-fluid">
    <form action="" method="post">
        @csrf
        <div class="mb-4">
            <label for="email">Correo</label>
            <input name="email" id="email" type="text" autofocus value="{{ old('email') }}" placeholder="Ingrese su correo electronico" class="form-control">
            @error('email')<span style="color: #d01414"> {{$message}} </span>@enderror
        </div>
        <div class="mb-4">
            <label for="password">Contraseña</label>
            <input name="password" id="password" type="text" placeholder="Ingrese su contraseña" class="form-control">
            @error('password')<span style="color: #d01414"> {{$message}} </span>@enderror
        </div>
        <div class="mb-4">
            <label for="recordar">
            <input type="checkbox" name="recordar" id="recordar" class="form-check" value="true"/>
                Recurda mi sesión <br>
            </label>
        </div>
        <div class="mb-4">
            <button  type="submit" class="btn btn-success">Ingresar</button>
        </div>
    </form>
</div>
</body>
</html>
