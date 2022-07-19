<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudymetrialCategory extends Model
{
    use HasFactory;
     protected $table = 'sm_categories';

    protected $fillable = [
        "name",
        "image",
        "slugid",
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

}
