<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizExamination extends Model
{
    use HasFactory;

    protected $fillable = [
      
        'quiz_categories_id',
        'quiz_sub_categories_id',
        'quiz_chapters_id',
        'quiz_topics_id',
        'exam_name',
        'rightmarks',
        'wrongmarks',
        'time_duration',

    ];

    public function quizCat(){
        return $this->hasOne(QuizCategory::class,'id','quiz_categories_id');
    }

    public function quizsubcat(){
        return $this->hasOne(QuizSubCategory::class,'id','quiz_sub_categories_id');
    }

    public function quizChat(){
        return $this->hasOne(QuizChapter::class,'id','quiz_chapters_id');
    }

    public function quiztopic(){
        return $this->hasOne(QuizTopic::class,'id','quiz_topics_id');
    }

    public function Quizexam(){
        return $this->hasMany(QuizQuestion::class,'quiz_examinations_id','id');
    }
    public function secondquestion(){
        return $this->hasOne(SecondQuestion::class,'id','question_id');
    }


    //  copy

    public function quizexamQ(){
        return $this->hasMany(QuizQuestion::class, 'quiz_examinations_id','id');
    }

    public function lang(){
        return $this->hasMany(QuizExaminationLanguage::class,"quiz_examination_id","id");
    }

    public function quizattm(){
        return $this->hasOne(QuizExam::class,'quiz_examinations_id','id');
    }

}
