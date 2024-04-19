<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Role>
 */
class RoleFactory extends Factory
{
    /**
     * Define the model's default state.c
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $roles = ['Admin', 'Chef', 'Cajero'];

        // Generar nombre único de categoría
        $name = $this->faker->unique()->randomElement($roles);

        return [
            'name' => $name,
        ];
    }
}
