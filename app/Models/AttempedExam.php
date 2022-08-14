<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttempedExam extends Model
{
    use HasFactory;


    public function examination (){
      return  $this->belongsTo(Examination::class,'examinations_id');
    }
    public function language(){
      return $this->hasOne(Language::class,"id","language_id");
  }
}
