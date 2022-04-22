<?php

namespace App\Models;

use Illuminate\Support\Str;
use App\Http\traits\CustomModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Author extends Model
{
    use HasFactory, SoftDeletes, CustomModelTrait;

    protected $hidden = ['pivot'];

    protected $dates = ['deleted_at'];

    protected $guarded = [];

    /**
     * boot function to create slug according to author title
     * while creating and updating author title
    */
    protected static function boot() {

        parent::boot();

        static::creating(function ($author) {
            $name = $author->first_name.' '.$author->middle_name.' '.$author->last_name;
            $author->slug = Str::slug($name);
        });

        static::updating(function ($author) {
            $name = $author->first_name.' '.$author->middle_name.' '.$author->last_name;
            $author->slug = Str::slug($name);
        });
    }

    public function books() {
        return $this->belongsToMany(Book::class);
    }

    public function country() {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function getFullNameAttribute() {
        return "{$this->first_name} {$this->middle_name} {$this->last_name}";
    }
    
}
