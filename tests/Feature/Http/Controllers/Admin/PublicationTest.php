<?php

namespace Tests\Feature\Http\Controllers\Admin;

use App\Http\traits\AddRemoveImageTrait;
use Tests\TestCase;
use App\Models\Country;
use App\Models\Publication;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PublicationTest extends TestCase
{
    use RefreshDatabase, WithFaker, AddRemoveImageTrait;
    /**
     * A basic test publication index view.
     *
     * @return void
     */
    public function test_can_get_publication_index_view()
    {
        $response = $this->get(route('admin.publications.index'));

        $response->assertStatus(200);
    }
    /**
     * A basic test publication can not add invalid publication.
     *
     * @return void
     */
    public function test_can_not_add_invalid_publication()
    {
        // $this->withoutExceptionHandling();

        $response = $this->post(route('admin.publications.store'),
                array_merge($this->publicationData(), ['title'=>'']));

        $this->assertCount(0, Publication::all());

        $response->assertSessionHasErrors(['title']);
    }
    /**
     * A test publication can add valid publication.
     *
     * @return void
     */
    public function test_can_add_valid_publication()
    {
        // $this->withoutExceptionHandling();

        $response = $this->post(route('admin.publications.store'), $this->publicationData());

        $this->assertCount(1, Publication::all());

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', Publication::all());

        // $response->assertOk();

        $this->removeUploadImage(Publication::first()->image, public_path('/assets/images/publication/'));
    }
    /**
     * A test publication can add valid publication.
     *
     * @return void
     */
    public function test_can_update_valid_publication()
    {
        // $this->withoutExceptionHandling();
        $publication = Publication::factory()->create();

        $this->assertCount(1, Publication::all());

        $data = $this->publicationData();

        $title = Str::title($data['title']);

        $response = $this->patch(route('admin.publications.update', ['publication'=>$publication->id]),
            $data);

        $this->assertEquals($title, Publication::first()->title);

        $response->assertOk();

        $this->removeUploadImage(Publication::first()->image, public_path('/assets/images/publication/'));

    }
    /**
     * A test publication can add valid publication.
     *
     * @return void
     */
    public function test_can_delete_valid_publication()
    {
        // $this->withoutExceptionHandling();
        $publication = Publication::factory()->create();

        $response = $this->delete(route('admin.publications.destroy', ['publication'=>$publication->id]),
        $this->publicationData());

        $this->assertCount(0, Publication::all());

        $response->assertOk();

        // removeUploadImage(Publication::first()->image, public_path('/assets/images/publication/'));

    }
    /**
     * Publication test data
     * @return array
    */
    private function publicationData(){
        $country = Country::factory()->create();
        return [
            'title' => $this->faker->words($nb=2, $asText=true),
            'country_id' => $country->id,
            'city' => $this->faker->words($nb=2, $asText=true),
            'address' =>'Test address, 50 North-Side lake, 6990',
            'fax' => '+491425367895',
            'phone' => '+491425367895',
            'email' => $this->faker->email(),
            'website' => $this->faker->url(),
            'post_box' => $this->faker->numberBetween(1000,9000),
            'publication_image' => UploadedFile::fake()->image('avatar.jpg'),
            'status' => 'Active'
        ];
    }
}
