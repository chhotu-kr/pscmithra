<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'slugid',
        'subject_id',
        'topic_id',
        'title',
        'description',
        'type',
        'price',
        'bannerimage',
        'bycount',
    ];

    public function subject(){
        return $this->hasOne(Subject::class,'id','subject_id');
    }
    public function topic(){
        return $this->hasOne(Topic::class,'id','topic_id');
    }
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
