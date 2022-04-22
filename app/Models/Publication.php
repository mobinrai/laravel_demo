<?php

namespace App\Models;

use Illuminate\Support\Str;
use App\Http\traits\CustomModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Publication extends Model
{
    use HasFactory, CustomModelTrait;

    protected $dates = ['deleted_at'];

    protected $guarded = [];

    protected static function boot(){
        parent::boot();
        //callback function for creating slug
        static::creating(function($publication){
            $publication->slug = Str::slug($publication->title);
        });

        static::updating(function($publication){
            $publication->slug = Str::slug($publication->title);
        });
    }

    public function country(){
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function books(){
        return $this->hasMany(Book::class);
    }

    public function getFaxAttribute() {
        return "+{$this->country->phoneCode}{$this->phone}";
    }
}
