<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Hash;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                Hidden::make('email_verified_at')
                    ->default(fn () => now()),
                TextInput::make('ci')
                    ->label('CI')
                    ->required()
                    ->unique(ignoreRecord: true),
                TextInput::make('phone')
                    ->label('Teléfono')
                    ->tel(),
                TextInput::make('address')
                    ->label('Dirección'),
                DatePicker::make('birth_date')
                    ->label('Fecha de Nacimiento')
                    ->before('-18 years')
                    ->validationMessages([
                        'before' => 'Debes ser mayor de 18 años para registrarte.',
                    ]),
                Toggle::make('status')
                    ->label('Estado Activo')
                    ->default(true)
                    ->disabled(fn () => ! auth()->user()->can('inactivate:User')),
                Select::make('type')
                    ->label('Tipo de Usuario')
                    ->options([
                        'admin' => 'Administrador',
                        'recepcionista' => 'Recepcionista',
                        'empleado' => 'Empleado',
                        'cliente' => 'Cliente',
                        'entrenador' => 'Entrenador',
                    ])
                    ->required()
                    ->disabled(fn () => ! auth()->user()->can('Update:User')),
                TextInput::make('password')
                    ->password()
                    ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                    ->dehydrated(fn ($state) => filled($state))
                    ->required(fn (string $context): bool => $context === 'create')
                    ->rules([
                        'min:8',
                        'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&.])[A-Za-z\d@$!%*?&.]+$/',
                    ])
                    ->validationMessages([
                        'min' => 'La contraseña debe tener al menos 8 caracteres.',
                        'regex' => 'La contraseña debe contener al menos una mayúscula, una minúscula, un número y un carácter especial (@, $, !, %, *, ?, &, .).',
                    ]),
            ]);
    }
}
