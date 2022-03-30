<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/json_files/country.json");
        $countries = json_decode($json);

        foreach ($countries->lists as $key => $value) {
            Country::create([
                "sortname" => $value->sortname,
                "name" => $value->name,
                "phoneCode" => $value->phoneCode,
            ]);
        }
    }
}
