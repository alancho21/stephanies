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
           // Array con los nombres de los productos y los IDs de las categorías
           $products = [
            ['name' => 'Hamburguesa de pollo', 'category_id' => 1],
            ['name' => 'Hamburguesa de Res', 'category_id' => 1],
            ['name' => 'Chilaquiles', 'category_id' => 2],
            ['name' => 'Ensalada', 'category_id' => 2],
            ['name' => 'Malteada de Vainilla', 'category_id' => 3],
            ['name' => 'Malteada de Chocolate', 'category_id' => 3],
            // Agrega más productos según lo necesites
        ];

        // Obtener un elemento aleatorio del array
        $product = $this->faker->unique()->randomElement($products);

        return [
            'name' => $product['name'],
            'price' => $this->faker->randomFloat(2, 50, 200),
            'description' => $this->faker->sentence,
            'category_id' => $product['category_id'],
            'ruta_imagen' => $this->faker->imageUrl(),
        ];
    }
}
