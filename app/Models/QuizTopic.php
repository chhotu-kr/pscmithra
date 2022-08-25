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
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    public function quizchapt(){
        return $this->hasOne(QuizChapter::class,'id','quiz_chapters');
    }
}
