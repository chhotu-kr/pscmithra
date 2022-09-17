<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseProduct extends Model
{
    use HasFactory;

    public function modules(){
        return $this->hasMany(Module::class, 'course_id','course_id');
    }

    public function product(){
        return $this->hasOne(Product::class, 'id','product_id');
    }

}
