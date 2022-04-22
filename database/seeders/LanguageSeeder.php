<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/json_files/language.json");
        $languages = json_decode($json);

        foreach ($languages as $key => $value) {
            Language::create([
                'code' => $value->code,
                'title'=> $value->name
            ]);
        }
    }
}
