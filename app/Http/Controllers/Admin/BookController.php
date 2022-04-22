<?php

namespace App\Http\Controllers\Admin;

use App\Models\Book;
use App\Models\User;
use App\Models\Category;
use App\Models\Publication;
use App\Models\Author;
use App\Models\Genre;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BookRequest;
use App\Http\traits\AddRemoveImageTrait;

class BookController extends Controller
{
    use AddRemoveImageTrait;

    private $folderPath = '/assets/images/books/';

    private $routeName = 'admin.books.index';
    //
    public function index()
    {
        $books = Book::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $book = new Book;
        $categories = Category::all();
        $publications = Publication::all();
        $authors = Author::all();
        $genres = Genre::all();        
        return view('admin.books.create', compact('book', 'categories', 'publications', 'authors', 'genres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\BookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        $data = $this->bookValidateData($request, null);
        $user = User::factory()->create();
        $data['user_id'] = $user->id;
        $this->DbBookTransation($data);        
        return redirect(route($this->routeName))->with('success', 'Book created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('admin.books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $categories = Category::all();
        $publications = Publication::all();
        $authors = Author::all();
        $genres = Genre::all();
        return view('admin.books.edit', compact('book', 'categories', 'publications', 'authors', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\BookRequest  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(BookRequest $request, Book $book)
    {
        if($request->hasFile('image')){
            if(null != $book->image){
                $this->removeUploadImage($book->image, public_path($this->folderPath));
            }
        }
        $data = $this->bookValidateData($request, $book->image);
        $user = User::factory()->create();
        $data['user_id'] = $user->id;
        $this->DbBookTransation($data, $book);
        return redirect(route($this->routeName))->with('success', 'Book updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
    }
    /**
     *@return \Illuminate\Http\Response
     */
    public function exportBook(Request $request){
        $this->validate($request, [
            'type_format' => ['required', Rule::in(['csv', 'xls', 'xlsx', 'ods', 'tsv', 'pdf'])],
            'from_date' => 'required|date',
            'to_date' => 'required|date',
        ]);
        $start_date = $request->from_date;
        $end_date = $request->to_date;

        $filename = 'Books-' . Carbon::now()->format('y_m_d-H_i_s') . '.' . $request->type_format;
        // Excel::store(new BooksExport($start_date, $end_date), 'excel/' . $filename, 'public');
    }
    private function DbBookTransation($data, $book=null){
        DB::transaction(function () use ($data, $book) {

            $category_id = $data['category'];
            $author_id = $data['author'];
            $genre_id = $data['genre'];
            $data['publication_id'] = $data['publication'];
            $remove = ["category", "author", "genre", "publication"];
            $new_data = array_diff_key($data, array_flip($remove));

            if(null!= $book){
                $book->update($new_data);
            }
            else{
                $book = Book::create($new_data);
            }
            if(isset($category_id)){
                $book->categories()->sync($category_id);
            }
            if(isset($author_id)){
                $book->authors()->sync($author_id);                
            }
            if(isset($genre_id)){
                $book->genres()->sync($genre_id);                
            }            
        }); 
    }
    /**
     * @return array
    */
    private function bookValidateData($request, $image=null){
        $book = $request->validated();
        $imageName = $image != null? $image : null;

        if($request->hasFile('image')){
            $array=[
                'path' => public_path($this->folderPath),
                'image' => $request->file('image'),
                'title' => $book['title']
            ];
            $imageName = $this->uploadImage($array);
        }
        $book['image'] = $imageName;

        return $book;
    }
}
