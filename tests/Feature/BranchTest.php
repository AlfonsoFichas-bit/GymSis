<?php

use App\Filament\Resources\Branches\Pages\CreateBranch;
use App\Models\Branch;
use App\Models\User;
use Database\Seeders\RoleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

uses(RefreshDatabase::class);

it('requires a unique name per address', function () {
    $this->seed(RoleSeeder::class);
    $admin = User::factory()->create(['type' => 'admin']);
    $this->actingAs($admin);

    Branch::factory()->create([
        'name' => 'Main Branch',
        'address' => '123 Main St',
    ]);

    Livewire::test(CreateBranch::class)
        ->fillForm([
            'name' => 'Main Branch',
            'address' => '123 Main St',
            'opening_time' => '08:00',
            'closing_time' => '22:00',
            'max_capacity' => 100,
        ])
        ->call('create')
        ->assertHasFormErrors(['name' => 'unique']);
});
