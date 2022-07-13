<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dish>
 */
class DishFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'price'=> rand(10000,50000),
            'des' => $this->faker->paragraph(),
            'ingredients' => $this->faker->paragraph(),
            'image' => 'hinh'.rand(1,10).'.jpg',
            'kind_id' => rand(1,3),
        ];
    }
}
