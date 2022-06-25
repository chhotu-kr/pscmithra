<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
class ApiCartController extends Controller
{
    //
    public function index(){
       return Cart::all(); 
    }
}
