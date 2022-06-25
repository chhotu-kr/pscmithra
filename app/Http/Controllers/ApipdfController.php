<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pdf;
class ApipdfController extends Controller
{
    //
    public function index(){
        return Pdf::all();
    }
}
