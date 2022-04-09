<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookSale extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){
        $this->belongsTo(User::class);
    }

    public function book(){
        $this->belongsTo(User::class);
    }

    public function bookSaleList(){
        return $this->hasMany(BookSaleList::class);
    }

}
