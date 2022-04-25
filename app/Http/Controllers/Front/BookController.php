<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function singleDetail($slug)
    {
        $bookDetail = Book::whereSlug($slug)->firstOrFail();
        return view('front.book.detail', compact('bookDetail'));
    }

    public function storeReview(){
        Auth::check();
    }
}
