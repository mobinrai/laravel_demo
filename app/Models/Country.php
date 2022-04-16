<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $dates = ['deleted_at'];

    /**
     * boot function to update sortname to upper case
     * while creating and updating country
    */
    protected static function boot() {

        parent::boot();

        static::creating(function ($country) {
            $country->sortname = Str::upper($country->sortname);
        });

        static::updating(function ($country) {
            $country->sortname = Str::upper($country->sortname);
        });
    }

    public function authors(){
        return $this->hasMany(Author::class, 'country_id');
    }

    public function publications(){
        return $this->hasMany(Publication::class, 'country_id');
    }
}
