<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPlan extends Model
{
    use HasFactory;

    


    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function cat(){
        return $this->hasone(Category::class,'id','category');
    }
    public function subcat(){
        return $this->hasOne(SubCategory::class,'id','subcategory');
    }


    public function qcat(){
        return $this->hasone(QuizCategory::class,'id','category');
    }
    public function qsubcat(){
        return $this->hasOne(QuizSubCategory::class,'id','subcategory');
    }

    public function qchapter(){
        return $this->hasone(QuizChapter::class,'id','subject');
    }
    public function qtopics(){
        return $this->hasOne(QuizTopic::class,'id','topic');
    }

    public function smc(){
        return $this->hasone(StudymetrialCategory::class,'id','category');
    }
    public function smt(){
        return $this->hasOne(StudymetrialChapter::class,'id','subject');
    }
    
}
