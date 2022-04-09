<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookFaq extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function book(){
        $this->belongsTo(Book::class);
    }
}
