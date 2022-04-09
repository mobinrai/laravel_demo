<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Genre extends Model
{
    use HasFactory;

    protected $guarded = [];
    /**
     * boot function to create slug according to genre title
     * while creating and updating genre title
    */
    protected static function boot() {

        parent::boot();

        static::creating(function ($genre) {
            $genre->slug = Str::slug($genre->title);
        });

        static::updating(function ($genre) {
            $genre->slug = Str::slug($genre->title);
        });
    }

    public function book(){
        return $this->belongsToMany(Book::class, 'book_genre');
    }
}
