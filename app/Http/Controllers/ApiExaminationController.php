<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Examination;
class ApiExaminationController extends Controller
{
    //
    public function index(){
        return Examination::all();
    }
}
