<?php

namespace App\Http\Controllers\Admin;

use App\Models\Genre;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GenreRequest;
use App\Http\traits\AddRemoveImageTrait;

class GenreController extends Controller
{
    use AddRemoveImageTrait;

    private $routeName = 'admin.genres.index';

    private $folderPath = '/assets/images/genre/';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genres = Genre::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.genres.index', compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genre = new Genre;
        return view('admin.genres.create', compact('genre'));
    }

   /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\GenreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GenreRequest $request)
    {
        $data = $request->validated();

        $imageName = null;

        if($request->hasFile('genre_image')) {
            $array=[
                'path' => public_path($this->folderPath),
                'image' => $request->file('genre_image'),
                'title' => $data['title']
            ];
            $imageName = $this->uploadImage($array);
        }
        Genre::create([
            'title' => Str::title($data['title']),
            'image' => $imageName,
            'status' => $data['status']
        ]);
        return redirect()->route($this->routeName)
            ->with('success', 'Genre added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function show(Genre $genre)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function edit(Genre $genre)
    {
        return view('admin.genres.edit', compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\GenreRequest  $request
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function update(GenreRequest $request, Genre $genre)
    {
        $data = $request->validated();

        $imageName = $genre->image;

        if($request->hasFile('genre_image'))
        {
            if(null != $genre->image) {
                $this->removeUploadImage($genre->image, public_path($this->folderPath));
            }
            $array=[
                'path' => public_path($this->folderPath),
                'image' => $request->file('genre_image'),
                'title' => $data['title']
            ];
            $imageName = $this->uploadImage($array);
        }

        $genre->update([
            'title'=>Str::title($data['title']),
            'image' => $imageName,
            'status' => $data['status']
        ]);
        return redirect()->route($this->routeName)
            ->with('success', 'Genre updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Genre $genre)
    {
        // if(null != $genre->image) {
        //     $this->removeImage($genre->image);
        // }
        $genre->delete();

        return redirect()->route($this->routeName)
            ->with('success', 'Genre deleted successfully');
    }

}
