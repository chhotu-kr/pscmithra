<?php

namespace App\Models;

use App\Models\livetest\liveAttempQuestion;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $table='questions';

    protected $fillable =[
     'subject_id',        
     'topic_id',        
     'name',            
     'rightans',        
     'slugid',                
     'isverified',        

    ];

    public function subject(){
        return $this->hasOne(Subject::class,"id","subject_id");
    }

    public function topic(){
        return $this->hasOne(Topic::class,'id','topic_id');
    }
    public function secondquestion(){
        return $this->hasMany(SecondQuestion::class);
      }
      public function mockAttemp(){
        return $this->hasOne(mockattempquestion::class,'questions_id','id');
      }

      public function liveAttemp(){
        return $this->hasOne(liveAttempQuestion::class,'questions_id','id');
      }
     
      public function quizAttemp(){
        return $this->hasOne(QuizAttemptQuestion::class,'question_id','id');
      }
}
