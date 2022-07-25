<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizChapter extends Model
{
    use HasFactory;

    protected $fillable=[
        'quiz_sub_categories',
        'name',
        'slugid',
    ];
    public function quizsubcat(){
        return $this->hasOne(QuizSubCategory::class,'id','quiz_sub_categories');
    }
}
