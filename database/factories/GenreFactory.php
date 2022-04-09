<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GenreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $status = ['Active', 'Inactive'];
        return [
            'title' => $this->faker->words($nb=2, $asText=true),
            'image' => $this->faker->image(public_path('/assets/images/genre'), 640, 480, null, false),
            'status'=> $status[array_rand($status)],
        ];
    }
}
