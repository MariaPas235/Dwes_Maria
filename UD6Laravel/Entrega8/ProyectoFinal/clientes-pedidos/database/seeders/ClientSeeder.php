<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;

class ClientSeeder extends Seeder
{
    public function run()
    {
        Client::create([
            'name' => 'Juan Pérez',
            'email' => 'juan.perez@example.com',
            'phone' => '123456789',
            'address' => 'Calle Falsa 123, Ciudad',
            'active' => true
        ]);
    }
}
