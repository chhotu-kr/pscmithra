<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function index(){
        return view('userRegister.index');
    }
    public function adminIndex(){
       // dd(Auth::guard('admin')->user()->hasRole('author'));
        return view('adminRegister.dashboard');
    }
}
