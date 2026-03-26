<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),
            // description is null for now, our AI will fill it later!
            'description' => null, 
            'start_date' => fake()->dateTimeBetween('+1 week', '+6 months'),
            'location' => fake()->city() . ' Arena',
            'capacity' => fake()->numberBetween(100, 5000),
            'price' => fake()->randomFloat(2, 50, 1000), // Random price between 50 and 1000
        ];
    }
}