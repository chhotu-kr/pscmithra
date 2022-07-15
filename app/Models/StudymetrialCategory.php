<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudymetrialCategory extends Model
{
    use HasFactory;
    // protected $table = 'StudymetrialCategory';

    protected $fillable = [
        "name",
        "image",
        "slugid",
    ];

}
