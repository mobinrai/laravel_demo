<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CountryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "sortname" => $this->faker->lexify(),
            "name" => $this->faker->words($nb=2, $asText=true),
            "phoneCode" => $this->faker->numberBetween(10, 250),
        ];
    }
}
