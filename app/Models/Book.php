<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable =[
        'slugid',
        'bookname',
    ];

    public function authors(){
        return $this->hasOne(Author::class,'id','authors_id');
    }
}
