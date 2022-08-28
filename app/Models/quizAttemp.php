<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class quizAttemp extends Model
{
    use HasFactory;
    protected $fillable = [
        "remain_time",
        "lastQues",
        "type",       
        "totalmarks"
    
      ];


    
//     public function quizexamination (){
//         return  $this->belongsTo(QuizExamination::class,'id');
// }

    public function examination (){
        return  $this->belongsTo(QuizExamination::class,'quiz_examinations_id');

      }
      public function language(){
        return $this->hasOne(Language::class,"id","language_id");
    }

}
