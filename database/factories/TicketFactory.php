<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(), // Automatically creates a user if not provided
            'event_id' => Event::factory(), // Automatically creates an event if not provided
            'ticket_number' => Str::upper(Str::random(10)), // e.g., 'A8F9B2X1YZ'
            'status' => fake()->randomElement(['valid', 'used', 'cancelled']),
        ];
    }
}