<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $hidden = ['pivot'];

    protected $dates = ['deleted_at'];
    /**
     * boot function to create slug according to book title
     * while creating and updating book title
    */
    protected static function boot() {

        parent::boot();

        static::creating(function ($book) {
            $book->title = Str::title($book->title);
            $book->slug = Str::slug($book->title);

        });

        static::updating(function ($book) {
            $book->title = Str::title($book->title);
            $book->slug = Str::slug($book->title);
        });
    }

    public function authors() {
        return $this->belongsToMany(Author::class, 'author_book');
    }

    public function genres(){
        return $this->belongsToMany(Genre::class, 'book_genre');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'book_category');
    }

    public function publication() {
        return $this->belongsTo(Publication::class);
    }

    public function faqs() {
        return $this->hasMany(BookFaq::class);
    }

    public function bookSale(){
        return $this->hasMany(BookSale::class);
    }

    public function languages()
    {
        return $this->belongsToMany(Language::class);
    }

    public function activeBookSale(){
        return $this->hasMany(BookSale::class)->whereStatus('Active');
    }

    public function orderBooks(){
        return $this->hasMany(OrderBooks::class);
    }

    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function getBookGenreAttribute($id=null){
        if(isset($id)) {
            return $this->genres->count()?$this->genres[0]->id:0;
        }
        return $this->genres->count()? Str::ucfirst($this->genres[0]->title):'-';
    }

    public function getBookCategoryAttribute($id=null){
        if(isset($id)){
            return $this->categories->count()>0?$this->categories[0]->id:0;
        }
        return $this->categories->count()>0?Str::ucfirst($this->categories[0]->title):'-';
    }

    public function getBookAuthorAttribute($id=null){

        if(isset($id)){
            return $this->authors->count()>0?$this->authors[0]->id:0;
        }
        return $this->authors->count()>0?$this->authors[0]->getFullNameAttribute():'-';
    }
}
