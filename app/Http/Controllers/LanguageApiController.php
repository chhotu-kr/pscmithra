<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Language;
class LanguageApiController extends Controller
{
    //
    public function index(){
        return Language::all();
    }
}
