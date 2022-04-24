<?php

namespace Tests\Feature\Http\Contorllers\Admin;

use Tests\TestCase;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\Http\Controllers\Admin\traits\AdminLoginTrait;

class CategoryTest extends TestCase
{
    use RefreshDatabase, AdminLoginTrait;

    private $routeName = 'admin.categories.index';
    /**
     * A test for admin categories index view.
     *
     * @return void
     */
    public function test_admin_category_index()
    {

        $response = $this->get('/admin/categories');

        $response->assertViewIs('admin.categories.index');

        $response->assertSuccessful();
    }
    /**
     * @return void
    */
    public function test_can_get_add_category()
    {

        $response = $this->get('/admin/categories/create');

        $response->assertViewIs('admin.categories.create');

        $response->assertSuccessful();
    }
    /**
     * @return void
    */
    public function test_can_not_add_invalid_category()
    {
        $response = $this->post(route('admin.categories.store'), array_merge($this->categoryData(), [
            'title'=>'123 name',
            'status'=>'not valid'
        ]));

        $this->assertCount(0, Category::all());

        $response->assertSessionHasErrors(['title', 'status']);
    }

    /**
     * @return void
    */
    public function test_can_add_valid_category()
    {
        $response = $this->post(route('admin.categories.store'), $this->categoryData());

        $this->assertCount(1, Category::all());

        $this->assertEquals('Test title', Category::first()->title);

        $response->assertRedirect(route($this->routeName));
    }

    /**
     * @return void
    */
    public function test_can_add_update_category()
    {
        $category = Category::factory()->create();

        $response = $this->patch(
            route('admin.categories.update', ['category'=>$category->id]),
            array_merge($this->categoryData(),['title' => 'Update Test title',])
        );

        $this->assertCount(1, Category::all());

        $this->assertEquals('Update Test title', Category::first()->title);

        $response->assertRedirect(route($this->routeName));

    }
    /**
     * @return void
    */
    public function test_can_destroy_category()
    {
        $category = Category::factory()->create();

        $this->assertCount(1, Category::all());

        $response = $this->delete(route('admin.categories.destroy', ['category'=>$category->id]));

        $this->assertCount(0, Category::all());

        $response->assertRedirect(route($this->routeName));

    }
    /**
     * @return array
    */
    private function categoryData(){
        return [
            'title' => 'Test title',
            'parent' => '',
            'status' => 'Active'
        ];
    }
}
