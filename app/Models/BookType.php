<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BookType extends Model
{
    use HasFactory, SoftDeletes;

    protected $hidden = ['pivot'];

    protected $dates = ['deleted_at'];

    protected $guarded = [];

    /**
     * boot function to create slug according to book_type title
     * while creating and updating book_type title
    */
    protected static function boot() {

        parent::boot();

        static::creating(function ($bookType) {
            $bookType->title = Str::title($bookType->title);
            $bookType->slug = Str::slug($bookType->title);
        });

        static::updating(function ($bookType) {
            $bookType->title = Str::title($bookType->title);
            $bookType->slug = Str::slug($bookType->title);
        });
    }
}
