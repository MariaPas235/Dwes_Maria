<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            ClientSeeder::class,
            OrderSeeder::class,
        ]);

        Client::factory()
        ->count(10)
        ->hasOrders(3)
        ->create();

    }
}
