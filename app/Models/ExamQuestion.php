<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamQuestion extends Model
{
    use HasFactory;

    protected $table= ('exam_questions');
    protected $fillable = [
        'examination_id',
        'question_id',
        'serialno',
        'slugid',
    ];

   
    public function secondquestion(){
        return $this->hasMany(SecondQuestion::class,"question_id","question_id");
    }
    public function question(){
        return $this->hasOne(Question::class,"id","question_id");
    }
}
