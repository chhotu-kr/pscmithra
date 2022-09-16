<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userCourse extends Model
{
    use HasFactory;

public function course(){
    return $this->hasOne(Course::class,'id','courses_id');
}

 public function product(){
        return $this->hasOne(Product::class,"id","product_id");
    }


}
