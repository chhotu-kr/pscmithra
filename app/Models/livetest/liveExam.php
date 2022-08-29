<?php

namespace App\Models\livetest;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class liveExam extends Model
{
    use HasFactory;


public function examQ(){
    return $this->hasMany(liveQuestion::class, 'live_exams_id','id');
}
public function attm(){
    return $this->hasOne(liveAttemp::class,'live_exams_id','id');
}

    public function lang(){
        return $this->hasMany(livelanguage::class,"live_exams_id","id");
    }
}
