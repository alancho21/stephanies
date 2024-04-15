<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Category;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->word,
            'price' => $this->faker->randomFloat(2, 50, 200),
            'description' => $this->faker->sentence,
            'category_id' => function () {
                return \App\Models\Category::inRandomOrder()->first()->id;
            },
            'ruta_imagen' => $this->faker->imageUrl(640, 480, 'products', true),
        ];
    }
}
