<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\file>
 */
class fileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type'=>"image",
            'name'=>"image",
            'url'=>fake()->imageUrl(400, 400, 'people'),
            'fileable_type'=>"App\Models\opeside",
            'fileable_id'=>fake()->numberBetween(1,200),
        ];
    }
}
