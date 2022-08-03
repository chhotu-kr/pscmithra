<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class examination extends Model
{
    use HasFactory;
    protected $table ='examinations';

    protected $fillable = [
       
        'category_id',
        'subcategory_id',
        'exam_name',
        'marks',
        'slugid',
        
        'time_duration',

    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

  

    public function category(){
        return $this->hasOne(Category::class,'id','category_id');
    }
    public function subcategory(){
        return $this->hasOne(SubCategory::class,'id','subcategory_id');
    }
    public function examQ(){
        return $this->hasMany(Examquestion::class,'examination_id','id');
    }
    public function secondquestion(){
        return $this->hasOne(SecondQuestion::class,'id','question');
    }
   
}
