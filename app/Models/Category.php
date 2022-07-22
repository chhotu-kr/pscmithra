<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = ('categories');

    protected $fillable=[
        'slugid',
        'exam_id',
        'category',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function exam(){
        return $this->hasOne(Exam::class,'id', 'exam_id');
    }
    public function subcat(){
        return $this->hasMany(SubCategory::class,'category_id','id');
    }

    
}
