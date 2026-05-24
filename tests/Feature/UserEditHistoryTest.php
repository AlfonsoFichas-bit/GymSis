<?php

use App\Filament\Resources\Users\Pages\EditUser;
use App\Models\User;
use Database\Seeders\RoleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Spatie\Activitylog\Models\Activity;

uses(RefreshDatabase::class);

it('editing user name preserves previous activity log entries', function () {
    $this->seed(RoleSeeder::class);
    $admin = User::factory()->create(['type' => 'admin']);
    $this->actingAs($admin);

    $user = User::factory()->create(['name' => 'Original Name']);

    $logsBefore = app(Activity::class)
        ->where('subject_type', User::class)
        ->where('subject_id', $user->id)
        ->get();

    Livewire::test(EditUser::class, ['record' => $user->id])
        ->fillForm(['name' => 'Updated Name'])
        ->call('save')
        ->assertHasNoFormErrors();

    foreach ($logsBefore as $log) {
        expect(app(Activity::class)->find($log->id))->not->toBeNull();
    }

    $editLog = app(Activity::class)
        ->where('subject_type', User::class)
        ->where('subject_id', $user->id)
        ->where('event', 'updated')
        ->latest()
        ->first();

    expect($editLog)->not->toBeNull();
    expect($editLog->properties['attributes']['name'] ?? null)->toBe('Updated Name');
    expect($editLog->properties['old']['name'] ?? null)->toBe('Original Name');
});
