<?php

namespace Database\Factories;

use App\Models\BranchService;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<BranchService>
 */
class BranchServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'branch_id' => \App\Models\Branch::factory(),
            'name' => fake()->randomElement(['Gimnasio', 'Piscina', 'Yoga', 'Crossfit']),
            'description' => fake()->sentence(),
            'capacity' => fake()->numberBetween(10, 50),
            'current_occupancy' => 0,
        ];
    }
}
