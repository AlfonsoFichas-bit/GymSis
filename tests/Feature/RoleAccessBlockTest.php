<?php

use App\Models\User;
use Database\Seeders\RoleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('cliente user receives forbidden on user creation page', function () {
    $this->seed(RoleSeeder::class);
    $cliente = User::factory()->create(['type' => 'cliente']);
    $this->actingAs($cliente);

    $response = $this->get('/admin/users/create');

    $response->assertForbidden();
});

it('admin user can access user creation page', function () {
    $this->seed(RoleSeeder::class);
    $admin = User::factory()->create(['type' => 'admin']);
    $this->actingAs($admin);

    $response = $this->get('/admin/users/create');

    $response->assertOk();
});
