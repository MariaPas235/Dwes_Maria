<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Client;

class OrderSeeder extends Seeder
{
    public function run()
    {
        $client = Client::first();

        Order::create([
            'order_number' => 'ORD-1001',
            'date' => now(),
            'status' => 'pendiente',
            'total' => 150.75,
            'notes' => 'First order notes',
            'client_id' => $client->id
        ]);
    }
}
