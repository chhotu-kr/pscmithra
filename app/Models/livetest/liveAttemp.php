<?php

namespace App\Models\livetest;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class liveAttemp extends Model
{
    use HasFactory;

    public function examination()
    {
      return  $this->belongsTo(liveExam::class, 'live_exams_id');
    }
    
    


}
