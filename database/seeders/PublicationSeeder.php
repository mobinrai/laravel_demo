<?php

namespace Database\Seeders;

use App\Models\Publication;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class PublicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = public_path().'/assets/images/publications';

        File::makeDirectory($path, 0755, true, true);

        Publication::factory(10)->create();
    }
}
