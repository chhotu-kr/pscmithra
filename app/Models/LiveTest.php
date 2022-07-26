<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiveTest extends Model
{
    use HasFactory;

    protected $fillable=[
        'start_at',
        'exam_name',
        'rightmarks',
        'wrongmarks',
        'time_duration',
        'slugid',
    ];
}
