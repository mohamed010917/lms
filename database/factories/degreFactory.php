<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\degre>
 */
class degreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'exam_id'=>fake()->numberBetween(1,200),
            'user_id'=>fake()->numberBetween(1,200),
            'full'=>100,
            'degre'=>fake()->numberBetween(1,100),
        ];
    }
}
