<?php

namespace Database\Factories;

use App\Models\BranchResource;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<BranchResource>
 */
class BranchResourceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $total = fake()->numberBetween(10, 50);
        return [
            'branch_id' => \App\Models\Branch::factory(),
            'name' => fake()->randomElement(['Mancuernas', 'Bicicletas', 'Caminadoras', 'Colchonetas']),
            'type' => fake()->randomElement(['Equipo', 'Accesorio', 'Mobiliario']),
            'total_quantity' => $total,
            'available_quantity' => fake()->numberBetween(0, $total),
        ];
    }
}
