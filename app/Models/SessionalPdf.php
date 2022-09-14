<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SessionalPdf extends Model
{
    use HasFactory;

    public function sessionpdf(){
        return $this->hasOne(Pdf::class,'id','pdf_id');
    }

    public function currentuser(){
        return $this->hasOne(User::class,'id','user_id');
    }

    public function product(){
        return $this->hasOne(Product::class,'id','product_id');
    }

    public function order(){
        return $this->hasOne(Order::class,'id','order_id');
    }
}
