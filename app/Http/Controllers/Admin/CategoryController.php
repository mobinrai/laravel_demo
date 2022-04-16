<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;


class CategoryController extends Controller
{
    private $routeName = 'admin.categories.index';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('created_at', 'desc')->paginate(10);
        $category_tree = Category::where('parent_id',0)->with('children')->get();
        return view('admin.categories.index', compact('categories', 'category_tree'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = new Category;
        $categories = Category::all();
        return view('admin.categories.create', compact('categories', 'category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->validated();
        Category::create($this->getDataArray($data));
        return redirect(route($this->routeName));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $categories = Category::all();
        return view('admin.categories.edit', compact('categories', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $data = $request->validated();
        $category->update($this->getDataArray($data));
        return redirect(route($this->routeName));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
        $type = 'error';
        if($category->children()->count()>0){
            $message = 'Could not delete. Category has '.$category->children()->count().' child category';
        }
        else if($category->books()->count()>0){
            $message = 'Could not delete. Category has '.$category->books()->count().' books';
        }else{
            $category->delete();
            $type = 'success';
            $message = 'Category deleted successfully';
        }
        return redirect(route($this->routeName))
        ->with($type, $message);
    }

    /**
     * Return array from given data with matching column names
     */
    private function getDataArray($data) {
        return [
            'title' => $data['title'],
            'parent_id' =>  ($data['parent']!=null || $data['parent']!='') ?  $data['parent'] : 0,
            'status' =>  $data['status'],
        ];
    }
}
