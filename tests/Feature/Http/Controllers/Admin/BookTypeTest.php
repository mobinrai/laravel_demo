<?php

namespace Tests\Feature\Http\Controllers\Admin;

use Tests\TestCase;
use App\Models\BookType;
use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookTypeTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * A test case for adding invalid book type.
     *
     * @return void
     */
    public function test_can_not_add_invalid_book_type()
    {
        $response = $this->post(route('admin.book-types.store'), ['title'=>null]);

        $this->assertCount(0, BookType::all());

        $response->assertSessionHasErrors('title');
    }
    /**
     * A test case for adding valid book type.
     *
     * @return void
     */
    public function test_can_add_valid_book_type()
    {
        // $this->withoutExceptionHandling();

        $response = $this->post(route('admin.book-types.store'), $this->bookTypeData());

        $this->assertCount(1, BookType::all());

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', BookType::all());

        $response->assertOk();

    }
    /**
     * A test case for updating valid book type.
     *
     * @return void
     */
    public function test_can_update_valid_book_type()
    {
        $bookType = BookType::factory()->create();

        $data = $this->bookTypeData();

        $title = $data['title'];

        $response = $this->patch(route('admin.book-types.update', ['book_type'=> $bookType->id]), $data);

        $this->assertCount(1, BookType::all());

        $this->assertEquals(Str::title($title), BookType::first()->title);

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', BookType::all());

        $response->assertOk();

    }
    /**
     * A test case for deleting valid book type.
     *
     * @return void
     */
    public function test_can_delete_valid_book_type()
    {
        $bookType = BookType::factory()->create();

        $this->assertCount(1, BookType::all());

        $response = $this->delete(route('admin.book-types.destroy', ['book_type'=> $bookType->id]));

        $this->assertCount(0, BookType::all());

        $response->assertOk();

    }
    /**
     *
    */
    private function bookTypeData()
    {
        return ['title' => $this->faker->words($nb=2, $asText=true)];
    }
}
