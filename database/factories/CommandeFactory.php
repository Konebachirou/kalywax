<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Commande>
 */
class CommandeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'number_commande' => fake()->numberBetween(1, 10000000000),
            'address' => fake()->address(),
            'country' => fake()->country(),
            'tel' => fake()->tollFreePhoneNumber(),
            'user_id' => User::all()->random()->id,
            'price_ttc' => fake()->randomFloat(2, 0, 1000),
        ];
    }
}
