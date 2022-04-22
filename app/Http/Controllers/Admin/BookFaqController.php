<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BookFaq;
use App\Models\Book;
use App\Http\Requests\Admin\BookFaqRequest;

class BookFaqController extends Controller
{
    private $routeName = 'admin.book-faqs.index';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookFaqs = BookFaq::with('book')->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.book_faqs.index', compact('bookFaqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bookFaq = new BookFaq;
        $books = Book::all();
        return view('admin.book_faqs.create', compact('bookFaq', 'books'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Request\Admin\BookFaqRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookFaqRequest $request)
    {
        $data = $this->getValidatedRequestData($request);
        BookFaq::create($data);

        return redirect(route($this->routeName))->with('success', 'Book Faq created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BookFaq  $bookFaq
     * @return \Illuminate\Http\Response
     */
    public function show(BookFaq $bookFaq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BookFaq  $bookFaq
     * @return \Illuminate\Http\Response
     */
    public function edit(BookFaq $bookFaq)
    {
        $books = Book::all();
        return view('admin.book_faqs.edit', compact('bookFaq', 'books'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Request\Admin\BookFaqRequest  $request
     * @param  \App\Models\BookFaq  $bookFaq
     * @return \Illuminate\Http\Response
     */
    public function update(BookFaqRequest $request, BookFaq $bookFaq)
    {
        $data = $this->getValidatedRequestData($request);

        $bookFaq->update($data);

        return redirect(route($this->routeName))->with('success', 'Book Faq updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BookFaq  $bookFaq
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookFaq $bookFaq)
    {
        $bookFaq->delete();
        return redirect(route($this->routeName))->with('success', 'Book Faq deleted successfully');
    }
    /**
     * validate form data, set book to book_id, 
     * remove book from data and return data
     * @return array 
     */
    private function getValidatedRequestData($request)
    {
        $data = $request->validated();

        $data['book_id'] = $data['book'];

        unset($data['book']);

        return $data;

    }
}
