<?php

namespace Tests\Feature\Http\Controllers\Admin;

use Tests\TestCase;
use App\Models\Book;
use App\Models\Publication;
use Illuminate\Support\Str;
use Ramsey\Uuid\Type\Integer;
use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * A test case for adding invalid book.
     *
     * @return void
     */
    public function test_can_not_add_invalid_book()
    {
        // $this->withoutExceptionHandling();

        $response = $this->post(route('admin.books.store'),
            [
                'title' => null,
                'sub_title' => '',
                'isbn' => '621554QWEQW',
                'isbn13' => '1472583690236',
                'marked_price' => '202.36',
                'sale_price' => '210.36',
                'pages' =>'10000'
            ]);

        $this->assertCount(0, Book::all());

        $response->assertSessionHasErrors(['title', 'edition','description','status', 'published_date']);
    }
    /**
     * A test case for adding valid book.
     *
     * @return void
     */
    public function test_can_add_valid_book()
    {
        // $this->withoutExceptionHandling();

        $response = $this->post(route('admin.books.store'), $this->bookData());

        $response->assertStatus(200);

        $this->assertCount(1, Book::all());

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', Book::all());

        // $response->assertLocation();
    }
    /**
     * A test case for updating valid book.
     *
     * @return void
     */
    public function test_can_update_valid_book()
    {
        // $this->withoutExceptionHandling();
        $book = Book::factory()->create();

        $this->assertCount(1, Book::all());

        $bookData = $this->bookData();

        $response = $this->patch(route('admin.books.update',['book'=>$book->id]), $bookData);

        $response->assertStatus(200);

        $this->assertEquals(Str::title($bookData['title']), Book::first()->title);

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', Book::all());

        // $response->assertLocation();
    }
    /**
     * A test case for deleting valid book.
     *
     * @return void
     */
    public function test_can_delete_valid_book()
    {
        // $this->withoutExceptionHandling();
        $book = Book::factory()->create();

        $this->assertCount(1, Book::all());

        $response = $this->delete(route('admin.books.destroy',['book'=>$book->id]));

        $response->assertStatus(200);

        $this->assertCount(0, Book::all());

        // $response->assertLocation();
    }
    /**
     * Returns book data for test
     * @return array
    */
    private function bookData(){

        $numbers = ['First', 'Second', 'Third', 'Fourth' ,'Fifth'];
        $status = ['Active', 'Inactive', 'Pending'];
        $publication = Publication::factory()->create();
        return [
            'title'=>$this->faker->words($nb=3, $asText=true),
            'sub_title'=>$this->faker->words($nb=2, $asText=true),
            'serial_number' => $this->faker->numberBetween(1147483647, 2147483647),
            'isbn' => $this->faker->numberBetween(1000000000, 2147483647),
            'isbn_13' => $this->faker->isbn13(),
            'edition' => $numbers[array_rand($numbers)].' edition',
            'pages' => $this->faker->numberBetween(100, 700),
            'marked_price' => $this->faker->randomFloat($nbMaxDecimals=2, $min=100, $max=500),
            'sale_price' => $this->faker->randomFloat($nbMaxDecimals=2, $min=100, $max=500),
            'stock_quantity'=> $this->faker->numberBetween(10, 1000),
            'description' => $this->faker->paragraph(),
            'status' => $status[array_rand($status)],
            'image' => UploadedFile::fake()->image('avatar.jpg'),
            'publication_id' => $publication->id,
            'published_date' => now()
        ];
    }
}
