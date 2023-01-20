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
            'image' => 'https://www.vermontteddybear.com/on/demandware.static/-/Sites-master-catalog-vtb/default/dw0c5c4cde/images/VTB/vtb-23846-18ohsosoftteddybear-lightbrown_feature4_20201012_0843.jpg',
        ];
    }
}
