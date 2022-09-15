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
        'address_id',
    ];

    public function product(){
        return $this->hasOne(Product::class,'id','prdoucts_id');
    }

    public function address(){
        return $this->hasOne(Address::class,'id','address_id');
    }
    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
