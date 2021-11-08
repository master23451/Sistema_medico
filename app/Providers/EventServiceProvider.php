<?php

namespace App\Providers;

use App\Models\Paciente;
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
                            'route' => 'doctor.admin.index'
                        ],
                        [
                            'text' => 'Secretarias',
                            'icon' => 'fas fa-user-nurse',
                            'route' => 'secretaria.index'
                        ],
                    ],
                ],
                [
                    'text' => 'Pacientes',
                    'icon' => 'fas fa-hospital-user',
                    'route' => 'paciente.index',
                    'label' =>  $conteoPaciente,
                    'label_color' =>'info',
                    'can' => 'loginAdministrador',
                ],
                [
                'text' => 'Consultorios',
                'url'  => '#',
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
        });
    }

}
