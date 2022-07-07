<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class examination extends Model
{
    use HasFactory;
    protected $table ='examinations';

    protected $fillable = [
        'exam_id',
        'category_id',
        'subcategory_id',
        'exam_name',
        'rightmarks',
        'wrongmarks',
        'time_duration',

    ];

    public function exam(){
        return $this->hasOne(Exam::class,'id','exam_id');
    }

    public function category(){
        return $this->hasOne(Category::class,'id','category_id');
    }
    public function subcategory(){
        return $this->hasOne(SubCategory::class,'id','subcategory_id');
    }
   
}
