<?php

use App\Filament\Resources\Users\Pages\CreateUser;
use App\Models\User;
use Database\Seeders\RoleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

uses(RefreshDatabase::class);

it('requires a unique CI', function () {
    $this->seed(RoleSeeder::class);
    $admin = User::factory()->create(['type' => 'admin']);
    $this->actingAs($admin);

    User::factory()->create(['ci' => '1234567']);

    Livewire::test(CreateUser::class)
        ->fillForm([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'ci' => '1234567',
            'password' => 'password',
            'type' => 'cliente',
        ])
        ->call('create')
        ->assertHasFormErrors(['ci' => 'unique']);
});

it('assigns the default cliente role when created without type or explicit role', function () {
    $this->seed(RoleSeeder::class);

    $user = User::factory()->create([
        'type' => null,
    ]);

    $user->refresh();

    expect($user->hasRole('cliente'))->toBeTrue();
    expect($user->type)->toBe('cliente');
});

it('ensures explicit type assignment takes precedence over fallback role assignment', function () {
    $this->seed(RoleSeeder::class);

    $user = User::factory()->create([
        'type' => 'admin',
    ]);

    $user->refresh();

    expect($user->hasRole('admin'))->toBeTrue();
    expect($user->hasRole('cliente'))->toBeFalse();
    expect($user->type)->toBe('admin');
});
