<?php

namespace App\Models\livetest;

use App\Models\Language;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class liveAttemp extends Model
{
    use HasFactory;

    public function examination()
    {
      return  $this->belongsTo(liveExam::class, 'live_exams_id');
    }
    public function language()
  {
    return $this->hasOne(Language::class, "id", "language_id");
  }
    


}
