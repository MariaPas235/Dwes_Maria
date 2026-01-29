<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    public function definition()
    {
        return [
            'order_number' => 'ORD-' . $this->faker->unique()->numberBetween(1000, 9999),
            'date' => $this->faker->date(),
            'status' => $this->faker->randomElement([
                'pendiente',
                'enviado',
                'entregado',
                'cancelado'
            ]),
            'total' => $this->faker->randomFloat(2, 10, 500),
            'notes' => $this->faker->optional()->sentence(),
        ];
    }
}
