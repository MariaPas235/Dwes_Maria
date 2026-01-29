<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        for ($i = 0; $i < 5; $i++) {
            DB::table('users')->insert([
                'name' => Str::random(10),
                'email' => Str::random(10) . '@example.com',
                'password' => Hash::make('password'),
            ]);
        }

        for ($i = 0; $i < 22; $i++) {
            DB::table('clothing_items')->insert([
                'name' => Str::random(10),
                'size' => Str::random(5),
                'price' => rand(10, 100),
                'color' => Str::random(5),
            ]);
        }

        User::factory()->create([
            'name' => 'Maria',
            'email' => 'maria@example.com',
        ]);
    }
}