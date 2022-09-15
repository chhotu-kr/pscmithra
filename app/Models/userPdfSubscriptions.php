<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userPdfSubscriptions extends Model
{
    use HasFactory;

public function pdf(){
    return $this->belongsTo(PdfSubscription::class,'pdf_subscriptions_id');
}

}
