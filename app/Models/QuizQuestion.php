<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizQuestion extends Model
{
    use HasFactory;
    protected $fillable = [
        'quiz_examinations_id',
        'question_id',
        
        'slugid',
    ];

    public function secondquestion(){
        return $this->hasMany(SecondQuestion::class,"question_id","question_id");
    }
    public function question(){
        return $this->hasOne(Question::class,"id","question_id");
    }
}
