<?php
namespace Database\Seeders;
use App\Models\Client;
use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        $clients = [
            "NK", "WPO"
        ];

        foreach($clients as $client)
        {
            Client::create([
                'name'  => $client,
                'color' => $faker->hexcolor
            ]);
        }
    }
}
