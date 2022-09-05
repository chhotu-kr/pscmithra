<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
class addToCartController extends Controller
{
    //

    public function index(){
        $data['product'] = Product::where('id',1)->first();
        return view('user/cart/Cart',$data);
    }
}
