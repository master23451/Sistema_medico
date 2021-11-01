<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EliminarUsuarioNotificacion extends Notification
{
    use Queueable;

    protected $usuarioAdmin, $usuario;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($usuarioAdmin, $usuario)
    {
        $this->usuarioAdmin=$usuarioAdmin;
        $this->usuario=$usuario;
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
            ->subject('Eliminacion usuario')
            ->greeting('Hola. ex-usuario '.$this->usuario)
            ->line('Este correo es para avisar que su datos se han eliminado de manera correcta.')
            ->line('El administrador: '.$this->usuarioAdmin.' fue el encargado de eliminar su perfil.')
            ->line('Esta accion ya no se puede revertir.')
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
