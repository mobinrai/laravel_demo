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
        $status = array(
            'Active',
            'Inactive',
        );
        $path = public_path().'/assets/images/genre';

        return [
            'title' => $this->faker->words($nb=2, $asText=true),
            'image' => $this->faker->image($path,640,480, null, false),
            'status'=> $status[array_rand($status)],
        ];
    }
}
