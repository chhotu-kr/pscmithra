<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table ="carts";
    protected $fillable = [
        'slugid',
        'product_id',
        'user_id',
    ];

    public function product(){
        return $this->hasOne(Product::class,'id','product_id');
    }

    public function address(){
        return $this->hasOne(Address::class,'id','address_id');
    }
}
