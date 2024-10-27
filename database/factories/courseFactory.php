<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\course>
 */
class courseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' =>["ar"=>fake()->name(),"en"=>fake()->name()],
            'image' =>fake()->imageUrl(400, 400, 'people'),
            'discriper' =>fake()->numberBetween(100,200),
            'descrption' =>["ar"=>fake()->text(),"en"=>fake()->text()],
            'recomendCount' =>fake()->numberBetween(100,200),
            'recomendNum' =>fake()->numberBetween(1,5),
        ];
    }
}
