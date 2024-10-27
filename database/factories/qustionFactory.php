<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\qustion>
 */
class qustionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $rightAnswer =fake()->name() ;
        return [
            'exam_id'=>fake()->numberBetween(1,200),
            'q'=>fake()->name(),
            'answr1'=>fake()->name(),
            'answr2'=>fake()->name(),
            'answr3'=>fake()->name(),
            'answr4'=>$rightAnswer,
            'right'=>$rightAnswer,
            'degre'=>10,
        ];
    }
}
