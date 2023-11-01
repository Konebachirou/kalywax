<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fullName' => fake()->firstName() . ' ' . fake()->lastName(),
            'email' => fake()->email(),
            'subject' => fake()->sentence(3),
            'message' => fake()->paragraph(1),
        ];
    }
}
