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
        'category',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    
    public function subcat(){
        return $this->hasMany(SubCategory::class,'category_id','id');
    }

    
}
