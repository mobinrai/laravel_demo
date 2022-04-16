<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookReview extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function book(){
        $this->belongsTo(Book::class);
    }

    public function user(){
        $this->belongsTo(User::class);
    }
}
