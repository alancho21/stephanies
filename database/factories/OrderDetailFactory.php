<?php

namespace Database\Factories;

use App\Models\Order;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $product = \App\Models\Product::inRandomOrder()->first();

        return [
            'order_id' => function () {
                return \App\Models\Order::inRandomOrder()->first()->id;
            },
            'product_id' => $product->id,
            'product_name' => $product->name,
            'price' => $this->faker->randomFloat(2, 50, 200),
            'quantity' => $this->faker->randomNumber(1),
        ];
    }
}
