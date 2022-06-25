<?php

namespace App\Http\Controllers;

use App\Models\coupon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    
    public function index()
    {
        //
        $data['coupon']= Coupon::all();
        return view('admin.ecommerce.insertCoupon',$data);
    }

    
    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
        $data= new Coupon();
        $data->code=$request->code;
        $data->percent=$request->percent;
        $data->slugid=md5($request->code .time());
        $data->save();
        return redirect('/coupon');
        
    }

    
    public function show(coupon $coupon)
    {
        //
    }

    
    public function edit(coupon $coupon)
    {
        //
        
    }

    
    public function update(Request $request, coupon $coupon)
    {
        //
    }

    
    public function destroy(coupon $coupon)
    {
        //
    }
}
