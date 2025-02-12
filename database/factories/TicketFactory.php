<?php

namespace Database\Factories;

use App\Models\Ticket;
use Illuminate\Database\Eloquent\Factories\Factory;

class TicketFactory extends Factory
{
    protected $model = Ticket::class;

    public function definition()
    {
        $faker = \Faker\Factory::create();
        return [
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
            'status_id' => $faker->numberBetween(1, 2),
            'priority_id' => $faker->numberBetween(1, 3),
            'category_id' => $faker->numberBetween(1, 3),
            'author_name' => $this->faker->name,
            'author_email' => $this->faker->email,
            'assigned_to_user_id' => null,
        ];
    }
}