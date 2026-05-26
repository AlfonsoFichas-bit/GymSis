<?php

use App\Filament\Pages\Auth\Login;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

uses(RefreshDatabase::class);

beforeEach(function () {
    \Spatie\Permission\Models\Role::firstOrCreate(['name' => 'cliente', 'guard_name' => 'web']);
    \Spatie\Permission\Models\Role::firstOrCreate(['name' => 'empleado', 'guard_name' => 'web']);
    \Spatie\Permission\Models\Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
});

it('can render the login and register page', function () {
    $this->get('/admin/login')->assertStatus(200);
});

it('can switch to register tab', function () {
    Livewire::test(Login::class)
        ->assertSet('isRegistering', false)
        ->call('switchToRegister')
        ->assertSet('isRegistering', true);
});

it('can register a new user successfully', function () {
    Livewire::test(Login::class)
        ->set('registerData.name', 'John Doe')
        ->set('registerData.email', 'john@example.com')
        ->set('registerData.password', 'password123')
        ->set('registerData.password_confirmation', 'password123')
        ->set('registerData.ci', '12345678')
        ->call('register')
        ->assertHasNoErrors();

    $this->assertDatabaseHas('users', [
        'email' => 'john@example.com',
        'name' => 'John Doe',
        'ci' => '12345678',
        'status' => 1,
    ]);
});

it('requires password confirmation to match', function () {
    Livewire::test(Login::class)
        ->set('registerData.name', 'John Doe')
        ->set('registerData.email', 'john2@example.com')
        ->set('registerData.password', 'password123')
        ->set('registerData.password_confirmation', 'different_password')
        ->call('register')
        ->assertHasErrors(['password' => 'confirmed']);

    $this->assertDatabaseMissing('users', [
        'email' => 'john2@example.com',
    ]);
});

it('fails if email is already taken', function () {
    User::factory()->create(['email' => 'taken@example.com']);

    Livewire::test(Login::class)
        ->set('registerData.name', 'Jane Doe')
        ->set('registerData.email', 'taken@example.com')
        ->set('registerData.password', 'password123')
        ->set('registerData.password_confirmation', 'password123')
        ->call('register')
        ->assertHasErrors(['email' => 'unique']);
});
