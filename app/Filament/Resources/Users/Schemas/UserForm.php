<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
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
                DateTimePicker::make('email_verified_at'),
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
                    ->label('Fecha de Nacimiento'),
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
                    ])
                    ->required()
                    ->disabled(fn () => ! auth()->user()->can('Update:User')),
                Select::make('roles')
                    ->relationship('roles', 'name')
                    ->multiple()
                    ->preload()
                    ->searchable()
                    ->label('Roles')
                    ->visible(fn () => auth()->user()->can('ViewAny:Role')),
                TextInput::make('password')
                    ->password()
                    ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                    ->dehydrated(fn ($state) => filled($state))
                    ->required(fn (string $context): bool => $context === 'create'),
            ]);
    }
}
