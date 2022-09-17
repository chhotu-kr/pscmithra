<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseQuiz extends Model
{
    use HasFactory;

    protected $fillable=[
        'CQname',
        'slugid',
    ];

    public function questions(){
        return $this->hasMany(CourseQuizQuestion::class,'course_quizzes_id','id');
    }


}
