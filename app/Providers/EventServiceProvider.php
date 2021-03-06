<?php

namespace App\Providers;

use App\Models\Doctor;
use App\Models\Evento;
use App\Models\Paciente;
use App\Models\Secretaria;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Event::listen(BuildingMenu::class, function (BuildingMenu $event){
            $conteoUser=User::all()->count();
            $conteoPaciente=Paciente::all()->count();
            $contadorDoctor=Doctor::all()->count();
            $contadorSecretaria=Secretaria::all()->count();
            
            //Opciones del panel administrador
            $event->menu->add(
                [
                'header' => 'Panel Administrador',
                'can' => 'loginAdministrador',
                'classes'   => 'text-yellow text-center'
                ],
                [
                    'text' => 'Dashboard',
                    'route' => 'dashboard.admin',
                    'icon'=> 'fas fa-chart-pie',
                    'can' => 'loginAdministrador'
                ],
                [
                    'text' => 'Usuarios',
                    'route' => 'usuario.index',
                    'icon'=> 'fas fa-user-shield',
                    'label' =>  $conteoUser,
                    'label_color' => 'warning',
                    'can' => 'loginAdministrador'
                ],
                [
                    'text' => 'Personal',
                    'icon' => 'fas fa-users',
                    'can' => 'loginAdministrador',
                    'submenu' => [
                        [
                            'text' => 'Doctores',
                            'icon' => 'fas fa-stethoscope',
                            'label' => $contadorDoctor,
                            'label_color' => 'info',
                            'route' => 'doctor.admin.index'
                        ],
                        [
                            'text' => 'Secretarias',
                            'icon' => 'fas fa-user-nurse',
                            'label' => $contadorSecretaria,
                            'label_color' => 'warning',
                            'route' => 'secretaria.admin.index'
                        ],
                    ],
                ],
                [
                    'text' => 'Pacientes',
                    'icon' => 'fas fa-hospital-user',
                    'route' => 'paciente.admin.index',
                    'label' =>  $conteoPaciente,
                    'label_color' =>'primary',
                    'can' => 'loginAdministrador',
                ],
                [
                'text' => 'Consultorios',
                'route'  => 'consultorios.index',
                'icon' => 'fas fa-clinic-medical',
                'can' => 'loginAdministrador',
                ],
                [
                    'text' => 'Publicaciones',
                    'icon' => 'fas fa-sticky-note',
                    'route' => 'publicacion.index',
                    'can' => 'loginAdministrador',
                ]
            );

            $event->menu->add(

                ['header' => 'Secretarias', 'can' => ['loginSecretaria', 'loginAdministrador'], 'classes'   => 'text-info text-center'],
                [
                    'text' => 'Citas',
                    'url'  => '/evento',
                    'icon' => 'far fa-address-book',
                    'can' => ['loginSecretaria', 'loginAdministrador'],
                ],
                [
                    'text' => 'Doctores',
                    'route'  => 'secretaria.doctor.index',
                    'icon' => 'fas fa-stethoscope',
                    'can' => ['loginSecretaria', 'loginAdministrador'],
                ],
                [
                    'text' => 'Pacientes',
                    'icon' => 'fas fa-hospital-user',
                    'route' => 'secretaria.paciente.index',
                    'can' => ['loginSecretaria', 'loginAdministrador'],
                ],
                [
                    'text' => 'Consultorios',
                    'route'  => 'consultorios.index',
                    'icon' => 'fas fa-clinic-medical',
                    'can' => ['loginSecretaria', 'loginAdministrador'],
                ],
            );

        });
    }

}
