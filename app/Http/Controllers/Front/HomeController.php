<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Genre;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $topAuthors = Author::whereTopAuthor('Yes')->orderBy('updated_at', 'desc')->take(10)->get();
        $genres = Genre::withCount('books')->whereNotNull('image')->whereStatus('Active')->orderBy('updated_at', 'desc')->take(10)->get();
        $books = Book::orderBy('created_at', 'asc')->get();
        $categories = Category::whereStatus('Active')->get();
        return view('front.index', compact('topAuthors','genres', 'books','categories'));
    }
}
