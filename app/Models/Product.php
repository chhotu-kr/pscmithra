<?php

namespace App\Models;

use Database\Seeders\BookSeeder;
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

    public function plans(){
        return $this->hasMany(ProductPlan::class, 'product','id');
    }

    public function book(){
        return $this->hasone(BookProduct::class, 'product_id','id');
    }
    public function course(){
        return $this->hasone(CourseProduct::class, 'product_id','id');
    }

    public function pdfs(){
        return $this->hasone(PdfProduct::class, 'product_id','id');
    }
    public function ebook(){
        return $this->hasone(PdfSubscriptionProduct::class, 'product_id','id');
    }
   
   


}
