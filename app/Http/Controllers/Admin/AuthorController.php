<?php

namespace App\Http\Controllers\Admin;

use App\Models\Author;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AuthorRequest;
use App\Http\traits\AddRemoveImageTrait;

class AuthorController extends Controller
{
    use AddRemoveImageTrait;

    private $folderPath = '/assets/images/authors/';

    public function index()
    {
        # code...
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\AuthorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AuthorRequest $request)
    {
        $data = $request->validated();

        $imageName = null;

        if($request->hasFile('image')){
            $array = [
                'path' => public_path($this->folderPath),
                'image' => $request->file('image'),
                'title' => Str::random(6).Str::reverse($data['first_name']).' '.$data['last_name']
            ];
            $imageName = $this->uploadImage($array);
        }
        $data['image'] = $imageName;

        Author::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\AuthorRequest  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(AuthorRequest $request, Author $author)
    {
        $data = $request->validated();

        $imageName = $author->image;

        if($request->hasFile('image')) {

            if(null != $author->image) {
                $this->removeUploadImage($author->image, public_path($this->folderPath));
            }
            $array = [
                'path' => public_path($this->folderPath),
                'image' => $request->file('image'),
                'title' => Str::random(6).Str::reverse($data['first_name']).' '.$data['last_name']
            ];
            $imageName = $this->uploadImage($array);
        }
        $data['image'] = $imageName;

        $author->update($data);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        $type = 'error';
        $message = 'Author deleted successfully';

        if($author->books()->count() > 0){
            $message = 'Could not delete. Author has '.$author->books()->count().' number/s of book/s';
        }
        else {
            $author->delete();
            $type = 'success';
        }
    }
}
