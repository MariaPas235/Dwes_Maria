<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Animal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Creamos el usuario administrador para las pruebas de la API
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('123456'), // Usamos Hash por seguridad
        ]);

        // Llamamos al seeder de animales que creamos antes
        $this->call(AnimalSeeder::class);
    }
}