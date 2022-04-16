<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    protected $guarded = [];
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

    public function books() {
        return $this->belongsToMany(Author::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function publication() {
        return $this->belongsTo(Publication::class);
    }

    public function faqs() {
        return $this->hasMany(FAQ::class);
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

}
