<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->words($nb=2, $asText=true),
        ];
    }
}
