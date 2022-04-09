<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SliderFactory extends Factory
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
            'title' => $this->faker->words(),
            'sub_title' => $this->faker->words(),
            'description' => $this->faker->paragraph(),
            'link' => $this->faker->url(),
            'image' => $this->faker->image(public_path('/assets/images/sliders'), 200, 300, null, false),
            'status' => $status[array_rand($status)]
        ];
    }
}
