<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class study extends Model
{
    use HasFactory;

    protected $table ='study_materials';

    protected $fillable = [
       
        'sm_categories_id',
        'sm_chapters_id',
        'content',
        

    ];

    
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function category(){
        return $this->hasOne(StudymetrialCategory::class,'id','sm_categories_id');
    }
    public function subcategory(){
        return $this->hasOne(StudymetrialChapter::class,'id','sm_chapters_id');
    }
}
