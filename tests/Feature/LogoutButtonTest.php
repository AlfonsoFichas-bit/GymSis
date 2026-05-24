<?php

use App\Models\User;
use Database\Seeders\RoleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('shows logout button on admin page when authenticated', function () {
    $this->seed(RoleSeeder::class);
    $admin = User::factory()->create(['type' => 'admin']);
    $this->actingAs($admin);

    $response = $this->get('/admin');

    $response->assertOk();
    $response->assertSee('Salir');
});

it('does not show logout button on login page', function () {
    $response = $this->get('/admin/login');

    $response->assertOk();
    $response->assertDontSee('Salir');
});
