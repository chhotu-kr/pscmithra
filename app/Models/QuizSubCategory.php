<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizSubCategory extends Model
{
    use HasFactory;

    protected $fillable=[
        'quiz_categories',
        'name',
        'slugid',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    public function quizcat(){
        return $this->hasOne(QuizCategory::class,'id','quiz_categories');
    }

    public function chapter(){
        return $this->hasMany(QuizChapter::class,'quiz_sub_categories','id');
    }
}
