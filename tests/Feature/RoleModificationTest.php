<?php

use App\Models\User;
use Database\Seeders\RoleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('admin can view user edit page with role selector', function () {
    $this->seed(RoleSeeder::class);
    $admin = User::factory()->create(['type' => 'admin']);
    $this->actingAs($admin);

    $user = User::factory()->create(['type' => 'cliente']);

    $response = $this->get("/admin/users/{$user->id}/edit");

    $response->assertOk();
    $response->assertSee('Tipo de Usuario');
});

it('cliente user cannot access other user edit page', function () {
    $this->seed(RoleSeeder::class);
    $cliente = User::factory()->create(['type' => 'cliente']);
    $this->actingAs($cliente);

    $otherUser = User::factory()->create(['type' => 'cliente']);

    $response = $this->get("/admin/users/{$otherUser->id}/edit");

    $response->assertNotFound();
});
