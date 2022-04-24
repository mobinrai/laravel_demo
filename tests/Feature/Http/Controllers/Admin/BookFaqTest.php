<?php

namespace Tests\Feature\Http\Controllers\Admin;

use App\Models\Book;
use App\Models\BookFaq;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\Http\Controllers\Admin\traits\AdminLoginTrait;
use Tests\TestCase;

class BookFaqTest extends TestCase
{
    use RefreshDatabase, WithFaker, AdminLoginTrait;

    private $routeName = 'admin.book-faqs.index';
    /**
     * A test for admin book-faqs index view.
     *
     * @return void
     */
    public function test_admin_book_faq_index()
    {

        $response = $this->get('/admin/book-faqs');

        $response->assertViewIs('admin.book_faqs.index');

        $response->assertSuccessful();
    }
    /**
     * @return void
    */
    public function test_can_get_add_book_faq()
    {

        $response = $this->get('/admin/book-faqs/create');

        $response->assertViewIs('admin.book_faqs.create');

        $response->assertSuccessful();
    }
    /**
     * @return void
    */
    public function test_can_not_add_invalid_book_faq()
    {
        $response = $this->post(route('admin.book-faqs.store'), array_merge($this->bookFaqData(), [
            'question'=>'',
        ]));

        $this->assertCount(0, BookFaq::all());

        $response->assertSessionHasErrors(['question']);
    }

    /**
     * @return void
    */
    public function test_can_add_valid_book_faq()
    {
        $response = $this->post(route('admin.book-faqs.store'), $this->bookFaqData());

        $this->assertCount(1, BookFaq::all());

        $response->assertRedirect(route($this->routeName));
    }

    /**
     * @return void
    */
    public function test_can_add_update_book_faq()
    {
        $bookFaq = BookFaq::factory()->create();

        $response = $this->patch(
            route('admin.book-faqs.update', ['book_faq'=>$bookFaq->id]),
            array_merge($this->bookFaqData(),['question' => 'Update Test question',])
        );

        $this->assertCount(1, BookFaq::all());

        $this->assertEquals('Update Test question', BookFaq::first()->question);

        $response->assertRedirect(route($this->routeName));

    }
    /**
     * @return void
    */
    public function test_can_destroy_book_faq()
    {
        $bookFaq = BookFaq::factory()->create();

        $this->assertCount(1, BookFaq::all());

        $response = $this->delete(route('admin.book-faqs.destroy', ['book_faq'=>$bookFaq->id]));

        $this->assertCount(0, BookFaq::all());

        $response->assertRedirect(route($this->routeName));

    }
    /**
     * @return array
    */
    private function bookFaqData(){
        $book = Book::factory()->create();
        return [
            'book' => $book->id,
            'question' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'answer' => $this->faker->text($maxNbChars = 200)
        ];
    }
}
