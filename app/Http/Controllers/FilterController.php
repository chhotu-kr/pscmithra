<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExamQuestion;
use App\Models\Question;
use App\Models\Examination;
class FilterController extends Controller
{
    // 
    public function FilterExamquestion(){
        $examination=Examination::all();
        $examquestion=ExamQuestion::all();
        return view('admin/manageExamquestion',compact('examquestion','questions'));
    }
}
