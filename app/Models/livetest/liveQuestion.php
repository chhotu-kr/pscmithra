<?php

namespace App\Models\livetest;

use App\Models\Question;
use App\Models\SecondQuestion;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class liveQuestion extends Model
{
    use HasFactory;

    public function secondquestion(){
        return $this->hasMany(SecondQuestion::class,"question_id","question_id");
    }
    public function question(){
        return $this->hasOne(Question::class,"id","question_id");
    }
}
