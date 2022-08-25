<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseQuizQuestion extends Model
{
    use HasFactory;

    public function Quizexam(){
        return $this->hasMany(Examquestion::class,'quiz_examinations_id','id');
    }
    public function secondquestion(){
        return $this->hasOne(SecondQuestion::class,'id','question_id');
    }
}
