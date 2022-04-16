<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Publication;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $numbers = ['First', 'Second', 'Third', 'Fourth' ,'Fifth'];

        $status = ['Active', 'Inactive', 'Pending'];

        $wordName = Str::random(12);

        $image = $this->faker->image(public_path('/assets/images/books'), 200, 300, $word=$wordName);

        return [
            'title'=>$this->faker->words($nb=3, $asText=true),
            'sub_title'=>$this->faker->words($nb=2, $asText=true),
            'serial_number' => $this->faker->numberBetween(1147483647, 2147483647),
            'isbn' => $this->faker->isbn10(),
            'isbn_13' => $this->faker->isbn13(),
            'edition' => $numbers[array_rand($numbers)].' edition',
            'pages' => $this->faker->numberBetween(100, 700),
            'marked_price' => $this->faker->randomFloat($nbMaxDecimals=2, $min=100, $max=500),
            'sale_price' => $this->faker->randomFloat($nbMaxDecimals=2, $min=100, $max=500),
            'stock_quantity'=> $this->faker->numberBetween(10, 1000),
            'description' => $this->faker->paragraph(),
            'status' => $status[array_rand($status)],
            'image' => $image,
            'user_id' => User::factory(),
            'publication_id' => Publication::factory(),
            'published_date' => now()
        ];
    }

}
