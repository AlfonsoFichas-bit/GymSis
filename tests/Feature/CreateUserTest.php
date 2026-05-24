<?php

use App\Filament\Resources\Users\Pages\CreateUser;
use App\Models\User;
use Database\Seeders\RoleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

uses(RefreshDatabase::class);

it('redirects after successful user creation', function () {
    $this->seed(RoleSeeder::class);
    $admin = User::factory()->create(['type' => 'admin']);
    $this->actingAs($admin);

    Livewire::test(CreateUser::class)
        ->fillForm([
            'name' => 'New User',
            'email' => 'newuser@example.com',
            'ci' => '87654321',
            'password' => 'password',
            'type' => 'cliente',
        ])
        ->call('create')
        ->assertHasNoFormErrors()
        ->assertRedirect();
});
