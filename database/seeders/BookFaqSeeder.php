<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BookFaq;

class BookFaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BookFaq::factory(5)->create();
    }
}
