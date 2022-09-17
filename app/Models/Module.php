<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $table = "modules";

    protected $fillable =[
        'course_id',
        'slugid',
       
        'name',
        'url',
        'text',
        'type',
        'quiz_id',
       
        'isfree',
        'index',
        
    ];

    public function course(){
        return $this->hasOne(Course::class,'id','course_id');
    }
    public function userModule(){
        return $this->hasOne(userCourseModule::class,'modules_id','id');
    }
    public function quiz(){
        return $this->hasOne(CourseQuiz::class,'id','quiz_id');
    }
}

