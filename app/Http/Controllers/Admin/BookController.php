<?php

namespace App\Http\Controllers\Admin;

use App\Models\Book;
use App\Models\User;
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
    //
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
     * @param  App\Http\Requests\Admin\BookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        $book = $this->bookValidateData($request);
        $user = User::factory()->create();
        $book['user_id'] = $user->id;
        Book::create($book);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
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
        $data = $this->bookValidateData($request);
        if($request->hasFile('image')){
            if(null != $book->image){
                $this->removeUploadImage($book->image, public_path($this->folderPath));
            }
        }
        $user = User::factory()->create();
        $data['user_id'] = $user->id;
        $book->update($data);
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
    /**
     * @return array
    */
    private function bookValidateData($request){
        $book = $request->validated();
        $imageName = null;
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
