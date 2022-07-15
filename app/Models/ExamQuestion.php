<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamQuestion extends Model
{
    use HasFactory;

    protected $table= ('exam_questions');
    protected $fillable = [
        'exam_id',
        'question_id',
        'serialno',
        'slugid',
    ];

    public function exam(){
        return $this->hasOne(Exam::class,'id','exam_id');
    }
    public function secondquestion(){
        return $this->hasOne(SecondQuestion::class,"id","question_id");
    }
    public function question(){
        return $this->hasOne(Question::class,"id","question_id");
    }
}
