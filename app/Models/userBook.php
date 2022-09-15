<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userBook extends Model
{
    use HasFactory;
    public function book(){
        return $this->hasone(Book::class, 'id','books_id');
    }
    public function order(){
        return $this->hasone(order::class, 'id','order_id');
    }
}
