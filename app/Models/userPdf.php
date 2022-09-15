<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userPdf extends Model
{
    use HasFactory;
    public function pdf(){
        return $this->hasone(Pdf::class,'id','pdfs_id');
    }
}
