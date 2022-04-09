<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(CountrySeeder::class);
        // $this->call(AuthorSeeder::class);
        // $this->call(GenreSeeder::class);
        // $this->call(CategorySeeder::class);
        // $this->call(LanguageSeeder::class);
        // $this->call(PublicationSeeder::class);
        // $this->call(BookSeeder::class);
        // $this->call(BookTypeSeeder::class);
        // $this->call(SliderSeeder::class);
    }
}
