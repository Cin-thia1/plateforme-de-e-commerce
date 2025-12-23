<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Order;
use App\Models\User;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition()
    {
        return [
            'date' => $this->faker->date(),
            'livree' => false,
            'client_id' => User::factory(),
            'address' => $this->faker->streetAddress(),
            'country' => $this->faker->country(),
            'region' => $this->faker->state(),
            'city' => $this->faker->city(),
            'zip' => $this->faker->postcode(),
            'payment_method' => 'cash',
            'notes' => null,
            'total' => $this->faker->randomFloat(2, 100, 10000),
            'delivery_status' => 'pending',
        ];
    }
}