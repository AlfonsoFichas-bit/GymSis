<?php

namespace App\Filament\Resources\Branches\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class BranchForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('code')
                    ->label('Código')
                    ->disabled()
                    ->dehydrated(false)
                    ->placeholder('SUC-XXX'),
                TextInput::make('name')
                    ->label('Nombre')
                    ->required(),
                TextInput::make('address')
                    ->label('Dirección')
                    ->required(),
                TimePicker::make('opening_time')
                    ->label('Hora de Apertura')
                    ->required(),
                TimePicker::make('closing_time')
                    ->label('Hora de Cierre')
                    ->required(),
                TextInput::make('max_capacity')
                    ->label('Capacidad Máxima')
                    ->required()
                    ->numeric(),
                Toggle::make('status')
                    ->label('Estado Activo')
                    ->default(true),
                Repeater::make('services')
                    ->relationship('services')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nombre del Servicio')
                            ->required(),
                        Textarea::make('description')
                            ->label('Descripción'),
                        TextInput::make('capacity')
                            ->label('Capacidad')
                            ->numeric()
                            ->required(),
                    ])
                    ->label('Servicios')
                    ->columns(2),
                Repeater::make('branchResources')
                    ->relationship('branchResources')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nombre del Recurso')
                            ->required(),
                        TextInput::make('type')
                            ->label('Tipo')
                            ->required(),
                        TextInput::make('total_quantity')
                            ->label('Cantidad Total')
                            ->numeric()
                            ->required(),
                        TextInput::make('available_quantity')
                            ->label('Cantidad Disponible')
                            ->numeric()
                            ->required(),
                    ])
                    ->label('Recursos')
                    ->columns(2),
            ]);
    }
}
