<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;
class ApiCouponController extends Controller
{
    //
    public function index(){
        return Coupon::all();
    }
}
