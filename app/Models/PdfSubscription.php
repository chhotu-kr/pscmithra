<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PdfSubscription extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'slugid',
        'type',
    ];

    public function pdfa(){
        return $this->hasMany(ItemPdfSubscription::class,'pdf_subscriptions_id','id');
    }


}
