<?php

namespace Tests\Feature\Http\Controllers\Admin;

use Tests\TestCase;
use App\Models\Genre;
use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\Http\Controllers\Admin\traits\AdminLoginTrait;

class GenreTest extends TestCase
{
    use RefreshDatabase, AdminLoginTrait;
    /**
     * A test case for genre index view.
     *
     * @return void
     */
    public function test_genre_index_view()
    {
        $response = $this->get(route('admin.genres.index'));

        $response->assertStatus(200);

        $response->assertViewIs('admin.genres.index');
    }
    /**
     * A test case for genre create view.
     *
     * @return void
     */
    public function test_genre_create_view()
    {
        $response = $this->get(route('admin.genres.create'));

        $response->assertStatus(200);

        $response->assertViewIs('admin.genres.create');
    }
    /**
     * A test case for genre invalid data for store.
     *
     * @return void
     */
    public function test_can_store_invalid_genre()
    {
        $response = $this->post(route('admin.genres.store'),
            array_merge($this->genreData(), ['title'=>'', 'status'=>'Test'])
        );

        $this->assertCount(0, Genre::all());

        $response->assertSessionHasErrors(['title', 'status']);
    }
    /**
     * A test case for genre invalid data for store.
     *
     * @return void
     */
    public function test_can_store_valid_genre()
    {
        $response = $this->post(route('admin.genres.store'), $this->genreData());

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', Genre::all());

        $response->assertSessionHas('success', 'Genre added successfully');

        $response->assertRedirect(route('admin.genres.index'));

        $this->unLinkImage();
    }
    /**
     * A test case for genre edit view.
     *
     * @return void
     */
    public function test_genre_edit_view()
    {
        $genre = Genre::factory()->create();

        $response = $this->get(route('admin.genres.edit', ['genre'=>$genre->id]));

        $response->assertStatus(200);

        $response->assertViewIs('admin.genres.edit');

        $this->unLinkImage();
    }
    /**
     * A test case for genre update.
     *
     * @return void
     */
    public function test_can_update_valid_genre()
    {
        $genre = Genre::factory()->create();

        $response = $this->patch(route('admin.genres.update', ['genre'=>$genre->id]),
            $this->genreData()
        );

        $this->assertEquals('Test Genre', Genre::first()->title);

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', Genre::all());

        $response->assertSessionHas('success', 'Genre updated successfully');

        $response->assertRedirect(route('admin.genres.index'));

        $this->unLinkImage();
    }
    /**
     * A test case for genre update.
     *
     * @return void
     */
    public function test_can_delete_genre()
    {
        $genre = Genre::factory()->create();

        $response = $this->delete(route('admin.genres.destroy', ['genre'=>$genre->id]));

        $this->assertCount(0, Genre::all());

        $response->assertSessionHas('success', 'Genre deleted successfully');

        $response->assertRedirect(route('admin.genres.index'));
    }
    /**
     *
     * @return array
     */
    private function genreData(){
        return [
            'title' => 'Test Genre',
            'image' => UploadedFile::fake()->image('avatar.jpg'),
            'status' => 'Active'
        ];
    }
    /**
     * remove/unlink image from genre folder after its moved
     * when creating genre while testing
     * @return void
     */
    private function unLinkImage(){
        $genre = Genre::first();
        if($genre->image!=null) {
            $imagePath = public_path().'/assets/images/genre/'.$genre->image;
            if(is_file($imagePath)) {
                unlink($imagePath);
            }
        }
    }
}
