<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Partnership;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory {

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        $secret = Str::random(40);
        $hashedSecret = bcrypt($secret);

        return [
            'name' => fake()->name(),
            'surname' => $this->faker->lastName(),
            'secret' => $hashedSecret,
            'partnership_id' => Partnership::inRandomOrder()->first()?->id,
            'created_at' => $this->faker->dateTimeThisDecade(),
        ];
    }
}
