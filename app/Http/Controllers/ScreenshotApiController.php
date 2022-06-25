<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Screenshot;
class ScreenshotApiController extends Controller
{
    //
    public function index(){
        return Screenshot::all();
    }
}
