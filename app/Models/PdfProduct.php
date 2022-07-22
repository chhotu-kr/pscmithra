<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PdfProduct extends Model
{
    use HasFactory;

    protected $fillable=[
        'product_id',
        'pdf_id',
        'slugid',
    ];

    public function product(){
        return $this->hasOne(Product::class,'id','product_id');
    }

    public function pdf(){
        return $this->hasOne(Pdf::class,'id','pdf_id');
    }
}
