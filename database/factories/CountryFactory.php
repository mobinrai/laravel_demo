<?php

namespace Database\Factories;

use Illuminate\Support\Str;
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
            'name' => $this->faker->words($nb=2, $asText=true),
            'sortname' =>$this->faker->countryCode(),
            'phoneCode' => $this->faker->numberBetween(10,500)
        ];
    }
}
