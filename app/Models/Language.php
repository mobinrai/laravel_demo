<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Language extends Model
{
    use HasFactory;

    protected $guarded = [];
    /**
     * boot function to create slug according to language title
     * while creating and updating language title
    */
    protected static function boot() {
        parent::boot();

        static::creating(function ($language) {
            $language->slug = Str::slug($language->title);
        });

        static::updating(function ($language) {
            $language->slug = Str::slug($language->title);
        });
    }

    public function books()
    {
        return $this->belongsToMany(Book::class);
    }
}
