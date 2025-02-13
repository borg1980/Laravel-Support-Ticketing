<?php
namespace Database\Seeders;
use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        $statuses = [
            'New', 'In progress', 'Resolved', 'Closed'
        ];

        foreach($statuses as $status)
        {
            Status::create([
                'name'  => $status,
                'color' => $faker->hexcolor
            ]);
        }
    }
}
