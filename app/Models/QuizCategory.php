<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizCategory extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'slugid',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
public function subcategory(){
    return $this->hasMany(QuizSubCategory::class,'quiz_categories','id');
}
}
