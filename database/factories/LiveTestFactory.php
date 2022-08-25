<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LiveTest>
 */
class LiveTestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'exam_name'=>$this->faker->word,
            'startat'=>$this->faker->word,
            'rightmarks'=>$this->faker->word,
            'wrongmarks'=>$this->faker->word,
            'time_duration'=>$this->faker->word,
            'slugid'=>$this->faker->word,
        ];
    }
}
