<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SecondQuestion extends Model
{
    use HasFactory;



    protected $fillable =[
     'language_id',        
     'question_id',        
     'direction',        
     'explanation',        
     'question',        
     'option1',        
     'option2',        
     'option3',        
     'option4',        
          
     'slugid',                
        

    ];

    public function language(){
        return $this->hasOne(Language::class,"id","language_id");
    }

    public function quest(){
        return $this->belongsTo(Question::class);
    }
}

