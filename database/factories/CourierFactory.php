<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Courier;

class CourierFactory extends Factory
{
    protected $model = Courier::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'phone' => $this->faker->phoneNumber(),
            'vehicle' => $this->faker->randomElement(['moto','voiture','camion']),
            'status' => 'available',
            'order_id' => null,
        ];
    }
}