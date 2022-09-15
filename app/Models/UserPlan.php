<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPlan extends Model
{
    use HasFactory;

    public function plans(){
        return $this->hasone(ProductPlan::class,'id','product_plans_id');
    }
}
