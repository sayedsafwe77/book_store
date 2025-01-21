<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ContactUs>
 */
class ContactUsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' =>[
                'en'=>fake()->sentence(7),
                'ar'=>fake()->sentence(7)
            ],
            'email' =>fake()->email(),
            'message' =>[
                'en'=>fake()->sentence(7),
                'ar'=>fake()->sentence(7)
            ]
        ];
    }
}
