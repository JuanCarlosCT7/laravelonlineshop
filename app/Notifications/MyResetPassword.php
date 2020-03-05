<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Auth\Notifications\ResetPassword;

class MyResetPassword extends ResetPassword
{

    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Obtener la notificacion de correo para restablecer la contraseña.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
        ->greeting('¡¡ Hola !!')
        ->line('Recibes este correo electrónico porque hemos recibido una solicitud de restablecimiento de contraseña para su cuenta.')
        ->action('Resetear Contraseña', route('password.reset',['token' => $this->token, 'email' => $notifiable->email]))
        ->line('Si no solicitó un restablecimiento de contraseña, no se requiere ninguna acción.')
        ->salutation('Atentamente, '.  'DroneShop.');
    }


    public function via($notifiable)
    {
        return ['mail'];
    }
}