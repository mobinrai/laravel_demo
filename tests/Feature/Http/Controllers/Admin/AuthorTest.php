<?php

namespace Tests\Feature\Http\Controllers\Admin;

use Tests\TestCase;
use App\Models\Author;
use App\Models\Country;
use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;

class AuthorTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * A test case for adding invalid author.
     *
     * @return void
     */
    public function test_can_not_add_invalid_author()
    {
        $response = $this->post(route('admin.authors.store'),
            array_merge($this->authorData(),[
                'first_name' => '',
                'last_name' => 'test_1',
                'phone' => 'QW123!@#Q',
                'country_id' => 'test',
                'top_author'=> 'Top Author'
            ]));

        $response->assertSessionHasErrors(['first_name', 'last_name', 'phone', 'country_id', 'top_author']);

        $this->assertCount(0, Author::all());
    }
    /**
     * A test case for adding valid author.
     *
     * @return void
     */
    public function test_can_add_valid_author()
    {
        $response = $this->post(route('admin.authors.store'), $this->authorData());

        $this->assertCount(1, Author::all());

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', Author::all());
    }
    /**
     * A test case for updating  valid author.
     *
     * @return void
     */
    public function test_can_update_valid_author()
    {
        $author = Author::factory()->create();

        $data = $this->authorData();

        $name = $data['first_name'];

        $this->patch(route('admin.authors.update', ['author'=> $author->id]), $data);

        $this->assertCount(1, Author::all());

        $this->assertEquals($name, Author::first()->first_name);

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', Author::all());
    }
    /**
     * A test case for deleting author.
     *
     * @return void
     */
    public function test_can_delete_valid_author()
    {
        $author = Author::factory()->create();

        $this->assertCount(1, Author::all());

        $this->delete(route('admin.authors.destroy', ['author'=> $author->id]));

        $this->assertCount(0, Author::all());
    }
    /**
     * Test data for author
     * @return array
     */
    public function authorData()
    {
        $status = ['Active', 'Inactive'];
        $top_author = ['Yes', 'No'];
        $gender = ['male', 'female'];
        $middle = [null, 'middle', 'test middle'];
        $country = Country::factory()->create();

        return [
            'first_name' => $this->faker->firstName($gender[array_rand($gender)]),
            'middle_name' => $middle[array_rand($middle)],
            'last_name' => $this->faker->lastName(),
            'country_id' => $country->id,
            'address' => $this->faker->streetAddress(),
            'phone' => '0147258963',
            'email' => $this->faker->email(),
            'website' => $this->faker->url(),
            'image' => UploadedFile::fake()->image('avatar.jpg'),
            'status' => $status[array_rand($status)],
            'top_author' => $top_author[array_rand($top_author)],
            'description' => $this->faker->text()
        ];
    }
}
