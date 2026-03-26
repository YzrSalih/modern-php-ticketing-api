<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Create 10 dummy users
        $users = User::factory(10)->create();

        // 2. Create 5 dummy events
        $events = Event::factory(5)->create();

        // 3. Let's buy some random tickets for these users and events
        foreach ($users as $user) {
            // Each user buys 1 to 3 tickets for random events
            $numberOfTickets = rand(1, 3);
            
            for ($i = 0; $i < $numberOfTickets; $i++) {
                Ticket::factory()->create([
                    'user_id' => $user->id,
                    'event_id' => $events->random()->id,
                ]);
            }
        }
    }
}