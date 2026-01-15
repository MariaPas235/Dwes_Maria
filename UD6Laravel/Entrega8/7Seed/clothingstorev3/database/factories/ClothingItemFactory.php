<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ClothingItem;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ClothingItem>
 */
class ClothingItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = ClothingItem::class;
    public function definition(): array
    {
        return [
            'name' => $this->faker->words(2, true), // e.g. "Summer Jacket"
            'size' => $this->faker->randomElement(['S', 'M', 'L', 'XL']),
            'price' => $this->faker->randomFloat(2, 10, 200), // 10.00 to 200.00
            'color' => $this->faker->safeColorName(), // e.g. "navy"
        ];
    }
}
