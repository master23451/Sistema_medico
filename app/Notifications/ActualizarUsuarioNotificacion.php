<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ActualizarUsuarioNotificacion extends Notification
{
    use Queueable;
    protected $usuarioAdmin, $usuario, $extra, $msj_extra;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($usuarioAdmin, $usuario, $extra='no', $msj_extra='sin mensaje')
    {
        $this->usuarioAdmin=$usuarioAdmin;
        $this->usuario=$usuario;
        $this->extra=$extra;
        $this->msj_extra=$msj_extra;
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
            ->subject('Actualizacion de datos del usuario')
            ->greeting('Hola. usuario '.$this->usuario)
            ->line('Este correo es para avisar que su datos se actalizaron de manera correcta.')
            ->line('El administrador: '.$this->usuarioAdmin.' fue el encargado de cambiar los datos.')
            ->line('Se restablecio la contraseña: '.$this->extra)
            ->line($this->msj_extra)
            ->line('Si usted no autorizo el cambio de datos o el restablecimiento de su contraseña se le recomienda acudir a la clinica.')
            ->line('De lo contrario haga caso caso omiso a este correo.')
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
