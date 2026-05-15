<?php

namespace App\Filament\Resources\Branches\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Database\Eloquent\Model;

class BranchAvailabilityWidget extends StatsOverviewWidget
{
    public ?Model $record = null;

    protected function getStats(): array
    {
        if (! $this->record) {
            return [];
        }

        $maxCapacity = $this->record->max_capacity;
        $currentOccupancy = $this->record->services()->sum('current_occupancy');
        $percentage = $maxCapacity > 0 ? round(($currentOccupancy / $maxCapacity) * 100) : 0;

        return [
            Stat::make('Ocupación Actual', "{$currentOccupancy} / {$maxCapacity}")
                ->description("{$percentage}% de la capacidad total")
                ->descriptionIcon('heroicon-m-users')
                ->color($percentage > 90 ? 'danger' : ($percentage > 70 ? 'warning' : 'success')),
        ];
    }
}
