@extends('adminlte::page')

@section('title', 'Dashboard Administrador')

@section('content_header')
    <h1>Dashboard</h1>
    <p>Panel de control del administrador.</p>
    <hr/>
@stop

@section('content')
    <div class="container-fluid">
        <div class="info-box bg-gradient-warning">
            <span class="info-box-icon"><i class="fas fa-clock"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Reloj</span>
                <span class="info-box-number" id="datos_reloj"></span>
            </div>
        </div>
        <!------------------------------------------------------------------------------------------------------------->
        <div class="row">
            <div class="col">
                <div class="small-box bg-gradient-primary">
                    <div class="inner">
                        <h3>{{ $contadorPaciente }}</h3>
                        <p>Pacientes registrados</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-hospital-user"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        Mas informacion <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="small-box bg-gradient-info">
                    <div class="inner">
                        <h3>44</h3>
                        <p>Doctores registrados</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-md"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        Mas informacion <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <!------------------------------------------------------------------------------------------------------------->
        <div class="mb-4">
            <div class="small-box bg-gradient-danger">
                <div class="inner">
                    <h3>{{ $contadorConsultorio }}</h3>
                    <p>Especialidades registradas</p>
                </div>
                <div class="icon">
                    <i class="fas fa-clinic-medical"></i>
                </div>
                <a href="#" class="small-box-footer">
                    Mas informacion <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!------------------------------------------------------------------------------------------------------------->
        <div class="row">
            <div class="col">
                <div class="small-box bg-gradient-success">
                    <div class="inner">
                        <h3>{{ $contadorUser }}</h3>
                        <p>Usuarios registrados</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-shield"></i>
                    </div>
                    <a href="{{ route('usuario.index') }}" class="small-box-footer">
                        Mas informacion <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="small-box bg-gradient-warning">
                    <div class="inner">
                        <h3>{{ $contadorSecretaria }}</h3>
                        <p>Secretaria registradas</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-female"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        Mas informacion <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <!------------------------------------------------------------------------------------------------------------->
        <div class="mb-4">
            <div class="small-box bg-gradient-light">
                <div class="inner">
                    <h3>44</h3>
                    <p>Citas registradas</p>
                </div>
                <div class="icon">
                    <i class="fas fa-calendar-day"></i>
                </div>
                <a href="#" class="small-box-footer" style=" color: #000000">
                    Mas informacion <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!------------------------------------------------------------------------------------------------------------->
        <hr/>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        (function () {

            var actualizarhora = function () {
                var fecha =new Date(),
                    horas = fecha.getHours(),
                    minutos = fecha.getMinutes(),
                    segundos = fecha.getSeconds(),
                    ampm,
                    dia = fecha.getDay(),
                    mes = fecha.getMonth(),
                    ano = fecha.getFullYear();

                var pfecha = document.getElementById('datos_reloj');

                var semana = ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
                    meses= ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

                if(horas >= 12){
                    horas = horas - 12;
                    ampm = 'PM'
                }else{
                    ampm = 'AM'
                }

                if(horas == 0){
                    horas == 12;
                }

                if(minutos < 10){
                    minutos = '0'+minutos;
                }

                if(horas < 10){
                    horas = '0'+horas;
                }

                if(segundos < 10){
                    segundos = '0'+segundos;
                }

                pfecha.textContent = semana[dia]+' '+dia+' de '+meses[mes]+' del '+ano+"\n"+ horas+' : '+minutos+' : '+segundos+' '+ampm;
            }
            actualizarhora();

            var intervalo = setInterval(actualizarhora, 1000);
        }());
    </script>
@stop
