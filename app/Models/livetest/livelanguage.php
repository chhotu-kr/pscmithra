<?php

namespace App\Models\livetest;

use App\Models\Language;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class livelanguage extends Model
{
    use HasFactory;

    public function language(){
        return $this->hasOne(Language::class,"id","language_id");
    }
}
