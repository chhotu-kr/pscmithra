<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userCourseModule extends Model
{
    use HasFactory;

    public function usercourse(){
        return $this->hasone(userCourse::class,'id', 'user_courses_id');
    }

    public function module(){
        return $this->hasone(Module::class,'id', 'modules_id');
    }


}
