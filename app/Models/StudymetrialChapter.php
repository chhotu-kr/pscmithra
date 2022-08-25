<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudymetrialChapter extends Model
{
    use HasFactory;
    protected $table="sm_chapters";
    protected $fillable = [
        "name",
        "sm_categories_id",
        "slugid",
    ];

    public function studymetrialcategory(){
        return $this->hasOne(StudymetrialCategory::class,'id','sm_categories_id');
    }

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
