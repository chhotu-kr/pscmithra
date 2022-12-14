<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $table = 'subjects';

    protected $fillable = [
        "sub_name",
        "image",
        "slogid",
    ];


    public function subtopic(){
        return $this->hasMany(Topic::class,'subject_id','id');
    }
}
