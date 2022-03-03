<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AnswerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'answer'=> $this->faker->realText($this->faker->numberBetween(10, 20)),
            'is_correct'=> $this->faker->numberBetween(0, 1),
            'value'=> $this->faker->numberBetween(0, 1),
            'status'=> $this->faker->numberBetween(0, 1),
            'order'=> $this->faker->numberBetween(0,100),
        ];
    }
}
