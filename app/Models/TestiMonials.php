<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestiMonials extends Model
{
    use HasFactory;

    public function subuser(){
        return $this->hasOne(User::class,'id','user_id');
    }
}
