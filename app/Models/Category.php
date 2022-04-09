<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $parentColumn = 'parent_id';

    protected $hidden = ['pivot'];

    protected $dates = ['deleted_at'];
    /**
     * boot function to create slug according to category title
     * while creating and updating category title
    */
    protected static function boot() {

        parent::boot();

        static::creating(function ($category) {
            $category->slug = Str::slug($category->title);
        });

        static::updating(function ($category) {
            $category->slug = Str::slug($category->title);
        });
    }

    public function categories()
    {
        return $this->hasMany(Category::class, $this->parentColumn);
    }

    public function children()
    {
        return $this->hasMany(Category::class, $this->parentColumn)->with('categories');
    }

    public function books(){
        return $this->belongsToMany(Book::class);
    }
}
