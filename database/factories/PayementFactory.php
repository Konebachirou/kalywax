<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PayementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titular' => fake()->firstName() . ' ' . fake()->lastName(),
            'number' => fake()->numerify('##########'),
            'date' => fake()->date(),
            'cryptogramme' => fake()->numerify('##########'),
            'user_id' => User::all()->random()->id,
        ];
    }
}
