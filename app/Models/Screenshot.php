<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Screenshot extends Model
{
    use HasFactory;
    protected $table = ('screenshots');
    protected $fillable =[
      'product_id',
      'slug_id',
      'scr_url',
    ];

    public function screenshot(){
      return $this->hasOne(Screenshot::class,'product_id','id');
    }
}
