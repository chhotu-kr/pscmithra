<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $table='sub_categories';

    protected $fillable=[
        'slugid',
        'category_id',
        'subcategory',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    public function category(){
        return $this->hasOne(Category::class,'id','category_id');
    }

   
}
