<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Book;

class BookFaqFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'book_id' => Book::factory(),
            'question' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'answer' => $this->faker->text($maxNbChars = 200)
        ];
    }
}
