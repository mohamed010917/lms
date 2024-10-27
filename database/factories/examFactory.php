<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\exam>
 */
class examFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>fake()->name(),
            'image'=>fake()->imageUrl(400, 400, 'people'),
            'descrption'=>fake()->text(),
            'time'=> 120,
            'opeside_id'=>fake()->numberBetween(1,200),
        ];
    }
}
