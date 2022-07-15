<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudymetrialChapter extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "studymetrialcategory_id",
        "slugid",
    ];

    public function studymetrialcategory(){
        return $this->hasOne(StudymetrialCategory::class,'id','studymetrialcategory_id');
    }

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
