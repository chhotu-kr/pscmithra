<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageProduct extends Model
{
    use HasFactory;
    protected $table='page_products';
    protected $fillable=[
        'pagename',
        'products-id',
        'slugid',
    ];

    public function pro(){
       return $this->hasOne(Product::class,'id','products_id');
    }
}
