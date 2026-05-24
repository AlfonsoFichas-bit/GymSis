<?php

namespace App\Filament\Resources\Branches\Schemas;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Illuminate\Validation\Rules\Unique;

class BranchForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // Sección de Información Principal
                Section::make('Información de la Sucursal')
                    ->description('Detalles básicos y horarios de operación.')
                    ->schema([
                        TextInput::make('code')
                            ->label('Código')
                            ->disabled()
                            ->dehydrated(false)
                            ->placeholder('SUC-XXX'),
                        TextInput::make('name')
                            ->label('Nombre')
                            ->required()
                            ->unique(modifyRuleUsing: function (Unique $rule, Get $get) {
                                return $rule->where('address', $get('address'));
                            }, ignoreRecord: true),
                        TextInput::make('address')
                            ->label('Dirección')
                            ->required()
                            ->columnSpanFull(), // Que ocupe todo el ancho

                        Grid::make(2) // Dividimos en 2 columnas para horarios y capacidad
                            ->schema([
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
                                    ->default(true)
                                    ->inline(false),
                            ]),
                    ])
                    ->columns(2),

                // Sección de Servicios
                Section::make('Servicios Disponibles')
                    ->description('Gestione los servicios que ofrece esta sucursal.')
                    ->collapsible() // Permite colapsar la sección
                    ->schema([
                        Repeater::make('services')
                            ->relationship('services')
                            ->schema([
                                TextInput::make('name')
                                    ->label('Nombre del Servicio')
                                    ->required(),
                                TextInput::make('capacity')
                                    ->label('Capacidad')
                                    ->numeric()
                                    ->required(),
                                Textarea::make('description')
                                    ->label('Descripción')
                                    ->columnSpanFull(),
                            ])
                            ->label('Lista de Servicios')
                            ->columns(2)
                            ->addActionLabel('Añadir Servicio'),
                    ]),

                // Sección de Recursos
                Section::make('Recursos e Inventario')
                    ->description('Equipamiento y recursos asignados.')
                    ->collapsible()
                    ->schema([
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
                            ->label('Lista de Recursos')
                            ->columns(2)
                            ->addActionLabel('Añadir Recurso'),
                    ]),
            ]);
    }
}
