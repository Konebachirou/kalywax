<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Collection;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use Nette\Utils\Random;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->sentences(4, true);
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => fake()->paragraphs(3, true),
            'price' => fake()->randomFloat(2, 10, 1000),
            'size' => fake()->randomElement(['S', 'M', 'L', 'XL', 'XXL']),
            'quantity' => fake()->randomElement([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]),
            'is_in_stock' => fake()->boolean(),
            'image_1' => fake()->imageUrl(),
            'image_2' => fake()->imageUrl(),
            'image_3' => fake()->imageUrl(),
            'category_id' => Category::all()->random()->id,
            'collection_id' => Collection::all()->random()->id,
        ];
    }
}
