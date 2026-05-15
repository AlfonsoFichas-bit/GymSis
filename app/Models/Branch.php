<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

#[Fillable(['code', 'name', 'address', 'opening_time', 'closing_time', 'max_capacity', 'status'])]
class Branch extends Model
{
    use HasFactory, LogsActivity;

    protected function casts(): array
    {
        return [
            'status' => 'boolean',
            'opening_time' => 'datetime:H:i',
            'closing_time' => 'datetime:H:i',
        ];
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable()
            ->logOnlyDirty()
            ->useLogName('branch')
            ->setDescriptionForEvent(fn(string $eventName) => match($eventName) {
                'created' => "Sucursal '{$this->name}' ha sido creada.",
                'updated' => "Sucursal '{$this->name}' ha sido actualizada.",
                'deleted' => "Sucursal '{$this->name}' ha sido eliminada.",
                default => "Sucursal '{$this->name}' - evento: {$eventName}",
            });
    }

    public function services(): HasMany
    {
        return $this->hasMany(BranchService::class);
    }

    public function branchResources(): HasMany
    {
        return $this->hasMany(BranchResource::class);
    }
}
