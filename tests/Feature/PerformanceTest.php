<?php

use App\Filament\Resources\Users\Pages\CreateUser;
use App\Models\Branch;
use App\Models\User;
use Database\Seeders\RoleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Spatie\Permission\PermissionRegistrar;

uses(RefreshDatabase::class);

it('renders the user listing page in less than 3 seconds', function () {
    $this->seed(RoleSeeder::class);
    app(PermissionRegistrar::class)->forgetCachedPermissions();

    $admin = User::factory()->create(['type' => 'admin']);
    $this->actingAs($admin);

    // Create some dummy users so the list is populated
    User::factory()->count(10)->create();

    // Warm up the application to avoid boot overhead in the measurement
    $this->get('/admin/users');

    $startTime = microtime(true);

    $response = $this->get('/admin/users');

    $endTime = microtime(true);
    $duration = $endTime - $startTime;

    $response->assertStatus(200);
    expect($duration)->toBeLessThan(3.0);
});

it('processes user creation in less than 3 seconds', function () {
    $this->seed(RoleSeeder::class);
    app(PermissionRegistrar::class)->forgetCachedPermissions();

    $admin = User::factory()->create(['type' => 'admin']);
    $this->actingAs($admin);

    $startTime = microtime(true);

    Livewire::test(CreateUser::class)
        ->fillForm([
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'ci' => '98765432',
            'password' => 'SecurePassword123!',
            'type' => 'cliente',
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    $endTime = microtime(true);
    $duration = $endTime - $startTime;

    expect($duration)->toBeLessThan(3.0);
});

it('renders the branch listing page in less than 3 seconds', function () {
    $this->seed(RoleSeeder::class);
    app(PermissionRegistrar::class)->forgetCachedPermissions();

    $admin = User::factory()->create(['type' => 'admin']);
    $this->actingAs($admin);

    // Create some dummy branches
    Branch::factory()->count(5)->create();

    $startTime = microtime(true);

    $response = $this->get('/admin/branches');

    $endTime = microtime(true);
    $duration = $endTime - $startTime;

    $response->assertStatus(200);
    expect($duration)->toBeLessThan(3.0);
});
