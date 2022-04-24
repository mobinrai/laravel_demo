<?php

namespace Tests\Feature\Http\Controllers\Admin;

use Tests\TestCase;
use App\Models\Language;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\Http\Controllers\Admin\traits\AdminLoginTrait;

class LanguageTest extends TestCase
{
    use RefreshDatabase, AdminLoginTrait;

    private $routeName = 'admin.languages.index';
    /**
     * A test case for language index.
     *
     * @return void
     */
    public function test_can_get_language_index_view()
    {
        $response = $this->get(route('admin.languages.index'));

        $response->assertStatus(200);

        $response->assertViewIs('admin.languages.index');
    }
    /**
     * A test case for language create form.
     *
     * @return void
     */
    public function test_can_get_language_create_form_view()
    {
        $response = $this->get(route('admin.languages.create'));

        $response->assertStatus(200);

        $response->assertViewIs('admin.languages.create');
    }
    /**
     * A test case for invalid language creation.
     *
     * @return void
     */
    public function test_can_add_invalid_language()
    {
        $response = $this->post(route('admin.languages.store'),
            array_merge($this->languageData(),['title'=>'']));

        $this->assertCount(0, Language::all());

        $response->assertSessionHasErrors('title');
    }

    /**
     * A test case for valid language creation.
     *
     * @return void
     */
    public function test_can_add_valid_language()
    {
        $response = $this->post(route('admin.languages.store'), $this->languageData());

        $this->assertCount(1, Language::all());

        $response->assertRedirect(route($this->routeName));

        $response->assertSessionHas('success', 'Language added successfully');
    }
    /**
     * A test case for language edit form.
     *
     * @return void
     */
    public function test_can_get_language_edit_form_view()
    {
        $language = Language::factory()->create();

        $response = $this->get(route("admin.languages.edit", ['language'=>$language->id]));

        $response->assertStatus(200);

        $response->assertViewIs('admin.languages.edit');
    }
    /**
     * A test case for valid language update.
     *
     * @return void
     */
    public function test_can_update_valid_language()
    {
        $language = Language::factory()->create();

        $response = $this->patch(route('admin.languages.update', ['language'=>$language->id]),
            $this->languageData());

        $this->assertEquals('Language', Language::first()->title);

        $response->assertRedirect(route($this->routeName));

        $response->assertSessionHas('success', 'Language updated successfully');
    }
    /**
     * A test case for valid language delete.
     *
     * @return void
     */
    public function test_can_delete_language()
    {
        $language = Language::factory()->create();

        $response = $this->delete(route('admin.languages.destroy', ['language'=>$language->id]));

        $this->assertCount(0, Language::all());

        $response->assertRedirect(route($this->routeName));

        $response->assertSessionHas('success', 'Language deleted successfully');
    }
    /**
     * @return array
    */
    private function languageData(){
        return [
            'title'=>'Language',
            'code' => 'la'
        ];
    }
}
