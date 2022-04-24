<?php

namespace Tests\Feature\Http\Controllers\Admin;

use Tests\TestCase;
use App\Models\Country;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\Http\Controllers\Admin\traits\AdminLoginTrait;

class CountryTest extends TestCase
{
    use RefreshDatabase, WithFaker, AdminLoginTrait;
    /**
     * A test case for adding invalid country.
     *
     * @return void
     */
    public function test_can_add_invalid_country()
    {
        $response = $this->post(route('admin.countries.store'),
            ['name'=>null, 'sortname'=>'TesT', 'phoneCode'=>'1477']);

        $this->assertCount(0, Country::all());

        $response->assertSessionHasErrors(['name','sortname', 'phoneCode']);

    }
    /**
     * A test case for adding valid country.
     *
     * @return void
     */
    public function test_can_add_valid_country()
    {
        $response = $this->post(route('admin.countries.store'), $this->countryData());

        $this->assertCount(1, Country::all());

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', Country::all());

        $response->assertRedirect(route('admin.countries.index'));

    }
    /**
     * A test case for updating valid country.
     *
     * @return void
     */
    public function test_can_update_valid_country()
    {
        $country = Country::factory()->create();

        $this->assertCount(1, Country::all());

        $response = $this->patch(route('admin.countries.update', ['country'=>$country->id]),
            $this->countryData());

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', Country::all());

        $response->assertRedirect(route('admin.countries.index'));

    }
    /**
     * A test case for deleting valid country.
     *
     * @return void
     */
    public function test_can_delete_valid_country()
    {
        $country = Country::factory()->create();

        $this->assertCount(1, Country::all());

        $response = $this->delete(route('admin.countries.destroy', ['country'=>$country->id]));

        $this->assertCount(0, Country::all());

        $response->assertRedirect(route('admin.countries.index'));

    }
    /**
     * Retrun test data country.
     *
     * @return array
     */
    private function countryData() {

        return [
            'name' => $this->faker->words($nb=2, $asText=true),
            'sortname' => $this->faker->lexify('??'),
            'phoneCode' => $this->faker->numberBetween(10, 250)
        ];
    }
}
