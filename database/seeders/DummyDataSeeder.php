<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\BranchResource;
use App\Models\BranchService;
use App\Models\User;
use Illuminate\Database\Seeder;

class DummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Create Branches with Services and Resources
        Branch::factory()
            ->count(5)
            ->create()
            ->each(function ($branch) {
                BranchService::factory()
                    ->count(rand(2, 4))
                    ->create(['branch_id' => $branch->id]);

                BranchResource::factory()
                    ->count(rand(3, 6))
                    ->create(['branch_id' => $branch->id]);
            });

        // 2. Create Users of different types
        $types = ['admin', 'recepcionista', 'empleado', 'cliente'];

        foreach ($types as $type) {
            User::factory()
                ->count(2)
                ->create(['type' => $type]);
        }
    }
}
