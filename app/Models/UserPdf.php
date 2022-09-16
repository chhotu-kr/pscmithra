<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPdf extends Model
{
    use HasFactory;

    public function sessionpdf(){
        return $this->hasMany(Pdf::class,'pdf_id','id');
    }

    public function currentuser(){
        return $this->hasOne(User::class,'id','user_id');
    }

    public function product(){
        return $this->hasMany(Product::class,'product_id','id');
    }

    public function order(){
        return $this->hasOne(Order::class,'id','order_id');
    }
}
