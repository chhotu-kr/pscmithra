<?php

namespace App\Models;

use App\Http\Livewire\CourseModule\Module;
use App\Models\Module as ModelsModule;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = "courses";

    protected $fillable =[
        // 'product_id',
        // 'slugid',
       
        // 'name',
        // 'course_url',
        // 'text',
        // 'type',
        // 'quiz_id',
       
        // 'is_free',
        // 'index',
        'name',
        'slugid',
        'createdby',
    ];
    public function modules(){
        return $this->hasMany(ModelsModule::class,'course_id','id');
    }
}
