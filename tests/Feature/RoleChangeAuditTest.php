<?php

use App\Models\User;
use Database\Seeders\RoleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Activitylog\Models\Activity;

uses(RefreshDatabase::class);

it('logs type changes with responsible admin ID and date', function () {
    $this->seed(RoleSeeder::class);

    $admin = User::factory()->create(['type' => 'admin']);

    $user = User::factory()->create(['type' => 'cliente']);

    $this->actingAs($admin);

    $user->type = 'empleado';
    $user->save();

    $activity = app(Activity::class)
        ->where('subject_type', User::class)
        ->where('subject_id', $user->id)
        ->where('event', 'updated')
        ->latest()
        ->first();

    expect($activity)->not->toBeNull();
    expect($activity->properties['attributes']['type'] ?? null)->toBe('empleado');
    expect($activity->properties['old']['type'] ?? null)->toBe('cliente');
    expect($activity->causer_id)->toBe($admin->id);
    expect($activity->causer_type)->toBe(User::class);
    expect($activity->created_at)->not->toBeNull();
});
