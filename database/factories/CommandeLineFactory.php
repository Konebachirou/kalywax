<?php

namespace Database\Factories;

use App\Models\Commande;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CommandeLine>
 */
class CommandeLineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => Product::all()->random()->id,
            'commande_id' => Commande::all()->random()->id,
            'quantite' => fake()->numberBetween(1, 10),
            'size' => fake()->numberBetween(['S', 'L', 'M', 'XL', 'XXL', '39', '40', '41', '43', '44', '45']),
        ];
    }
}
