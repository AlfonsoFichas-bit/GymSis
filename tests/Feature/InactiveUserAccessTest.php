<?php

use App\Models\User;
use Database\Seeders\RoleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('denies access to inactive users on Filament panel', function () {
    $this->seed(RoleSeeder::class);

    $user = User::factory()->create([
        'status' => true,
    ]);

    $this->actingAs($user);

    $response = $this->get('/admin');
    $response->assertOk();

    $user->status = false;
    $user->save();

    $response = $this->get('/admin');
    $response->assertForbidden();
});
