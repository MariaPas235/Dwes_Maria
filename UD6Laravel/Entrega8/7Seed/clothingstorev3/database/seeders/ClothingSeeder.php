<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ClothingItem;

class ClothingSeeder extends Seeder
{
    public function run()
    {
        // Add some fixed clothing items
        ClothingItem::insert([
            [
                'name' => 'Camiseta',
                'size' => 'M',
                'price' => 19.99,
                'color' => 'Negro',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Vaqueros',
                'size' => 'L',
                'price' => 49.99,
                'color' => 'Azul',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sudadera',
                'size' => 'XL',
                'price' => 39.99,
                'color' => 'Negro',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Generate 20 random clothing items using the factory
        ClothingItem::factory()->count(20)->create();
    }
}