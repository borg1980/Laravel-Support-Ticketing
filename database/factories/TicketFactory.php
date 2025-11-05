<?php

namespace Database\Factories;

use App\Models\Ticket;
use App\Models\Status;
use App\Models\Priority;
use App\Models\Category;
use App\Models\Client;
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
            'status_id' => Status::inRandomOrder()->first()->id,
            'priority_id' => Priority::inRandomOrder()->first()->id,
            'category_id' => Category::inRandomOrder()->first()->id,
            'client_id' => Client::inRandomOrder()->first()->id,
            'author_name' => $this->faker->name,
            'author_email' => $this->faker->email,
            'assigned_to_user_id' => null,
        ];
    }
}