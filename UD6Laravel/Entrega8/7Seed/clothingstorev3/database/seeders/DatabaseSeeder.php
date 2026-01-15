<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeders.
     */
    // database/seeders/DatabaseSeeder.php
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            ClothingSeeder::class, // your existing seeder
        ]);
    }
}