<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pdf extends Model
{
    use HasFactory;
    protected $table = ('pdfs');
    protected $fillable =[
      'product_id',
      'slug_id',
      'pdf_url',
    ];

    // public function product(){
    //   return $this->hasOne(Product::class,'id','product_id');
    // }
}
