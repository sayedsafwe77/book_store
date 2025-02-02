<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => fake()->name(),
            "description" => fake()->name(),
            "slug" => fake()->name(),
            "image" => fake()->name(),
            "quantity" => fake()->randomDigit(),
            "rate" => fake()->randomFloat(),
            "publish_year" => 2025,
            "price" => fake()->randomDigitNotZero(),
            "is_available" => true,
            "category_id" => 1,
            "publisher_id" =>1,
            "author_id" => 1,

        ];
    }
}
