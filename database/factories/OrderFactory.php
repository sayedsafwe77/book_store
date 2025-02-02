<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\ShippingArea;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'number' => fake()->unique()->numerify('ORD-####'),
            'shipping_fee' => fake()->randomFloat(2, 5, 100),
            'books_total' => fake()->randomFloat(2, 10, 500),
            'total' => fake()->randomFloat(2, 50, 1000),
            'status' => fake()->randomElement(['pending', 'delivered', 'refunded']),
            'payment_status' => fake()->randomElement(['unpaid', 'paid', 'refunded']),
            'payment_type' => fake()->randomElement(['cash', 'visa']),
            'tax_amount' => fake()->randomFloat(2, 0, 50),
            'transaction_reference' => fake()->unique()->bothify('Ref-####??##'),
            'address' => fake()->address(),
            'shipping_area_id' => ShippingArea::inRandomOrder()->first()?->id ?? ShippingArea::factory()->create()->id,
            'user_id' => User::inRandomOrder()->first()?->id ?? User::factory()->create()->id,
        ];
    }
}