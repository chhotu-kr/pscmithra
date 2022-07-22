<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemPdfSubscription extends Model
{
    use HasFactory;

    protected $fillable=[
        'pdf_subscriptions_id',
        'name',
        'url',
        'slugid',
    ];

    public function pdf_subs(){
        return $this->hasOne(PdfSubscription::class,'id','pdf_subscriptions_id');
    }
}
