<?php

namespace App\Providers;

use App\Models\Branch;
use App\Models\User;
use App\Observers\BranchObserver;
use App\Observers\UserObserver;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        User::observe(UserObserver::class);
        Branch::observe(BranchObserver::class);

        ResetPassword::toMailUsing(function (object $notifiable, string $token) {
            $url = url(route('filament.admin.auth.password-reset.reset', [
                'token' => $token,
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
        });
    }
}
