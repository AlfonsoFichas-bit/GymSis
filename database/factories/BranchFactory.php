<?php

namespace Database\Factories;

use App\Models\Branch;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Branch>
 */
class BranchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->company() . ' Branch',
            'address' => fake()->address(),
            'opening_time' => '06:00',
            'closing_time' => '22:00',
            'max_capacity' => fake()->numberBetween(50, 200),
            'status' => true,
        ];
    }
}
