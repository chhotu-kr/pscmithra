<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'book_id',
        'slugid',
    ];

    public function product(){
        return $this->hasOne(Product::class,'id','product_id');
    }

    public function book(){
        return $this->hasOne(Book::class,'id','book_id');
    }
}
