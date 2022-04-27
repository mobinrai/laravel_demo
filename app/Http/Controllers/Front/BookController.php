<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\BookReviewRequest;
use App\Models\Book;
use App\Models\BookReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * @param $slug
     */
    public function singleDetail($slug)
    {
        $bookDetail = Book::whereSlug($slug)->firstOrFail();
        return view('front.book.detail', compact('bookDetail'));
    }
    /**
     * Show the application dashboard.
     * @param Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function allBooks(Request $request)
    {
        $query = Book::whereStatus('Active');
        $sortBy = array_values($request->query());
        $sortValue = array_pop($sortBy);
        if($request->has('sort-by') && isset($sortValue))
        {
            switch($sortValue)
            {
                case 'latest':
                    $books = $query->orderBy('created_at', 'asc')->paginate(6);
                    break;
                case 'popularity':
                    $books = $query->with('authors')->orderBy('created_at', 'desc')->paginate(6);
                    break;
                case 'best-rating':
                        $books = $query->orderBy('title', 'desc')->paginate(6);
                        break;    
            }
        }else{
            $books = $query->orderBy('title', 'asc')->paginate(6);
        }
        
        return view('front.book.all', compact('books'));
    }
    /**
     * Add book reviews.
     * 
     * @param App\Http\Requests\Front\BookReviewRequest $request
     * @return \Illuminate\Http\Response
     */
    public function storeReview(BookReviewRequest $request){
        $data = $request->validated();
        $rating = array_key_exists('rating', $data)? $data['rating']: 0;
        BookReview::create([
            'book_id' => $data['book'],
            'user_id' => Auth::user()->id,
            'stars' => $rating,
            'review' => $data['comment'],
            'status' => 'Active',
        ]);

        return back()->with('success', 'Review added successfully');
    }
}
