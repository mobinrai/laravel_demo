<?php

namespace Database\Factories;

use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

class PublicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $status =['Active', 'Inactive'];

        return [
            'title' => $this->faker->words($nb=2, $asText=true),
            'country_id' => Country::factory(),
            'city' => $this->faker->name(),
            'address' => $this->faker->name(),
            'fax' => $this->faker->phoneNumber(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'website' => $this->faker->url(),
            'post_box' => $this->faker->numberBetween(1200,9000),
            'image' => $this->faker->image(public_path('/assets/images/publications'), 200, 250, null, false),
            'status' => $status[array_rand($status)]
        ];
    }
}
