<?php

use App\Filament\Pages\Auth\Login;
use App\Filament\Resources\Users\Pages\EditUser;
use App\Models\User;
use Database\Seeders\RoleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

uses(RefreshDatabase::class);

it('user record remains in database after inactivation', function () {
    $this->seed(RoleSeeder::class);
    $admin = User::factory()->create(['type' => 'admin']);
    $this->actingAs($admin);

    $user = User::factory()->create([
        'name' => 'Test User',
        'email' => 'test@example.com',
        'status' => true,
    ]);
    $userId = $user->id;

    Livewire::test(EditUser::class, ['record' => $user->id])
        ->fillForm(['status' => false])
        ->call('save')
        ->assertHasNoFormErrors();

    expect(User::find($userId))->not->toBeNull();
    expect(User::find($userId)->name)->toBe('Test User');
    expect(User::find($userId)->status)->toBeFalse();
});

it('inactive user login is rejected', function () {
    $this->seed(RoleSeeder::class);

    $user = User::factory()->create([
        'status' => false,
        'password' => bcrypt('password'),
    ]);

    Livewire::test(Login::class)
        ->fillForm([
            'email' => $user->email,
            'password' => 'password',
        ])
        ->call('authenticate')
        ->assertHasFormErrors(['email']);
});
