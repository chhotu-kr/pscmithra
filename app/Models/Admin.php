<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HaspermissionsTrait;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Admin extends Authenticatable 
{
    use HasFactory,HaspermissionsTrait;

    protected $fillable = [
        'name',
        'email',
        'contact',
        'password',
    ];

    public function setPasswordAttribute($value){
        $this->attributes['password']  = Hash::make($value);
    }


    public function scopeIsActive($query)
    {
        return $query->where('is_active',1);
    }

    public function role(){
        return $this->hasOne(Role::class,'id','role_id');
    }
}
