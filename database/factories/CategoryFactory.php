<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = ['Hamburguesas', 'Ensaladas', 'Bebidas'];

        // Generar nombre único de categoría
        $name = $this->faker->unique()->randomElement($categories);

        return [
            'name' => $name,
        ];
    }
}
