<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPlan extends Model
{
    use HasFactory;

    


    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function cat(){
        return $this->hasone(Category::class,'id','category_id');
    }
    public function subcat(){
        return $this->hasOne(SubCategory::class,'id','subcategory_id');
    }
    
}
