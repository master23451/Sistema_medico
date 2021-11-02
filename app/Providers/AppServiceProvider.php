<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        VerifyEmail::$toMailCallback = function ($notifiable, $verificationUrl){
            return (new MailMessage)
                ->subject('Verificacion de correo electronico.')
                ->greeting('Hola. nuevo usuario')
                ->line('Para poder ingresar al sistema se le solicita que verifique su correo electronico.')
                ->action('Verificar correo', $verificationUrl)
                ->salutation('Gracias.');
        };
    }
}
