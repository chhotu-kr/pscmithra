<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;

    public function orderItem(){
        return $this->hasMany(OrderItem::class,"order_id","id");
    }
    public function coupon(){
        return $this->hasOne(Coupon::class,"id","coupon_id");
    }
}
