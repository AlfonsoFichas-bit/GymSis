<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\ResetPassword as ResetPasswordNotification;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPassword extends ResetPasswordNotification
{
    public function toMail($notifiable): MailMessage
    {
        $url = url(route('filament.admin.auth.password-reset.reset', [
            'token' => $this->token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ], false));

        return (new MailMessage)
            ->subject('Restablecer tu contraseña - '.config('app.name'))
            ->greeting('¡Hola '.$notifiable->name.'!')
            ->line('Recibiste este correo porque solicitaste restablecer la contraseña de tu cuenta en **'.config('app.name').'**.')
            ->action('Restablecer Contraseña', $url)
            ->line('Este enlace expirará en '.config('auth.passwords.'.config('auth.defaults.passwords').'.expire').' minutos.')
            ->line('Si no solicitaste este cambio, puedes ignorar este correo.')
            ->salutation('Atentamente, el equipo de '.config('app.name'));
    }
}
