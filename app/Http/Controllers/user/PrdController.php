<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class PrdController extends Controller
{
    public function prd(){

        $data['product']= Product::all();
        return view('user.product',$data);
    }
}
