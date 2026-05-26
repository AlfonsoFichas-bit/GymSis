<?php

namespace App\Filament\Pages\Auth;

use App\Models\User;
use Filament\Auth\Http\Responses\Contracts\LoginResponse;
use Filament\Auth\Pages\Login as BaseLogin;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Locked;

class Login extends BaseLogin
{
    public bool $isRegistering = false;

    public ?array $registerData = [];

    protected string $view = 'filament.pages.auth.login';

    public function authenticate(): ?LoginResponse
    {
        try {
            return parent::authenticate();
        } catch (ValidationException $e) {
            throw $e;
        }
    }

    protected function getCredentialsFromFormData(array $data): array
    {
        return [
            'email' => $data['email'],
            'password' => $data['password'],
            'status' => true,
        ];
    }

    public function switchToLogin(): void
    {
        $this->isRegistering = false;
        $this->registerData = [];
    }

    public function switchToRegister(): void
    {
        $this->isRegistering = true;
    }

    public function register(): void
    {
        $validator = Validator::make($this->registerData, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'ci' => ['nullable', 'string', 'max:20'],
            'phone' => ['nullable', 'string', 'max:20'],
            'address' => ['nullable', 'string', 'max:255'],
            'birth_date' => ['nullable', 'date'],
        ], [
            'name.required' => 'El nombre es obligatorio.',
            'email.required' => 'El email es obligatorio.',
            'email.email' => 'El email debe ser un correo electrónico válido.',
            'email.unique' => 'El email ya está registrado.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
        ]);

        $validated = $validator->validate();

        $emailRateLimitKey = 'filament-register:'.sha1($validated['email']);
        if (RateLimiter::tooManyAttempts($emailRateLimitKey, maxAttempts: 2)) {
            Notification::make()
                ->title(__('filament-panels::auth/pages/register.notifications.throttled.title', [
                    'seconds' => RateLimiter::availableIn($emailRateLimitKey),
                ]))
                ->danger()
                ->send();

            return;
        }

        RateLimiter::hit($emailRateLimitKey);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'ci' => $validated['ci'] ?? null,
            'phone' => $validated['phone'] ?? null,
            'address' => $validated['address'] ?? null,
            'birth_date' => $validated['birth_date'] ?? null,
            'status' => true,
        ]);

        Notification::make()
            ->success()
            ->title('Registro exitoso. Ahora puedes iniciar sesión.')
            ->send();

        $this->registerData = [];
        $this->isRegistering = false;
    }
}
