<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\OrderType;
use App\Models\Partnership;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type_id' => OrderType::inRandomOrder()->first()?->id,
            'partnership_id' => Partnership::inRandomOrder()->first()?->id,
            'user_id' => User::inRandomOrder()->first()?->id,
            'description' => $this->faker->sentence(),
            'date' => $this->faker->dateTimeThisDecade(),
            'address' => $this->faker->address(),
            'amount' => $this->faker->randomNumber(),
            'status' => $this->faker->randomNumber(nbDigits:1),
        ];
    }
}
