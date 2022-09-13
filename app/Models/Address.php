<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table="addresses";
    protected $fillable = [
        'product_id',
        'slugid',
        'name',
        'state',
        'city',
        'pincode',
    ];
public function product(){
    return $this->hasOne(Product::class,'id','product_id');
}

public function user(){
    return $this->hasOne(User::class,'id','user_id');
}

}
