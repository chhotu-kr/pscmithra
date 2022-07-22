<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable=[
        'title',
        'category_id',
        'description',
        'righby',
    ];

    public function categ(){
        return $this->hasOne(Category::class,'id','category_id');
    }
}
