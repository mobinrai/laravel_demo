<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::factory(2)->create()->each(function ($category) {
            Category::factory(2)->hasChildren(2)->create(['parent_id'=>$category->id]);
        });
    }
}
