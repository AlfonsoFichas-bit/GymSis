<?php

use App\Models\User;
use Database\Seeders\RoleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;

uses(RefreshDatabase::class);

it('blocks access to users page and redirects to login post-logout', function () {
    $this->seed(RoleSeeder::class);
    $admin = User::factory()->create(['type' => 'admin']);

    // 1. Authenticate user
    $this->actingAs($admin);

    // Verify we can access the page while authenticated
    $response = $this->get('/admin/users');
    $response->assertStatus(200);

    // 2. Perform logout
    $this->post('/admin/logout');

    // Verify session destruction
    expect(Auth::check())->toBeFalse();

    // 3. Attempt to access the protected page again
    $responseBlocked = $this->get('/admin/users');

    // Should redirect to login page
    $responseBlocked->assertRedirect('/admin/login');
});

it('blocks access to branches page and redirects to login post-logout', function () {
    $this->seed(RoleSeeder::class);
    $admin = User::factory()->create(['type' => 'admin']);

    // 1. Authenticate user
    $this->actingAs($admin);

    // Verify we can access the page while authenticated
    $response = $this->get('/admin/branches');
    $response->assertStatus(200);

    // 2. Perform logout
    $this->post('/admin/logout');

    expect(Auth::check())->toBeFalse();

    // 3. Attempt to access branches page
    $responseBlocked = $this->get('/admin/branches');

    $responseBlocked->assertRedirect('/admin/login');
});
