<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RegistrarUsuarioNotificacion extends Notification
{
    use Queueable;

    protected $email, $rol;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($email, $rol)
    {
        $this->email=$email;
        $this->rol=$rol;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Registro de nuevo usuario')
                    ->greeting('Hola. Nuevo usuario')
                    ->line('Es para avisar que su registro se realizo de manera correcta.')
                    ->line('Contraseña temporal: 12345678')
                    ->line('Se recomienda cambiar su contraseña los mas rapido posible')
                    ->line('Rol asigando por el administrador: '.$this->rol)
                    ->action('Ir a la pagina', url('/login'))
                    ->line('Gracias por su preferencia!')
                    ->salutation('Clinica Especialistas de tlaxcala');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
