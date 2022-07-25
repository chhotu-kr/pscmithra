<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizTopic extends Model
{
    use HasFactory;

    protected $fillable=[
        'quiz_chapters',
        'name',
        'slugid',
    ];
    public function quizchapt(){
        return $this->hasOne(QuizCategory::class,'id','quiz_chapters');
    }
}
