<?php

namespace Database\Factories;

use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

class AuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $status = ['Active', 'Inactive'];
        $top_author = ['Yes', 'No'];
        $gender = ['male', 'female'];

        return [
            'first_name' => $this->faker->firstName($gender[array_rand($gender)]),
            'middle_name' => 'middle',
            'last_name' => $this->faker->lastName(),
            'country_id' => Country::factory(),
            'address' => $this->faker->streetAddress(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'website' => $this->faker->url(),
            'image' => $this->faker->image(public_path('/assets/images/authors'), 200, 300, null, false),
            'status' => $status[array_rand($status)],
            'top_author' => $top_author[array_rand($top_author)],
            'description' => $this->faker->text()
        ];
    }
}
