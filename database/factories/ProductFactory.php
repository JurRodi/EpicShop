<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition()
    {
        return [
            'name' => $this->faker->firstname,
            'price' => $this->faker->numberBetween(20, 60),
            'description' => $this->faker->text,
            'category' => $this->faker->word,
            'image' => $this->faker->imageUrl(640, 480, 'cats'),
        ];
    }
}
