<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        //
        $data['cart']=Cart::all();
        $data['product']=Product::all();
        $data['address']=Address::all();
        $data['user']=User::all();

        return view('ecommerce.insertCart',$data);
    }

    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
        $data= new Cart();
        $data->slugid=md5($request->cart .time());
        $data->product_id=$request->product_id;
        $data->address_id=$request->address_id;
        $data->user_id=$request->user_id;
        $data->save();
       
        return redirect()->route('cart.index');
    }

    
    public function show(Cart $cart)
    {
        //
    }

    
    public function edit(Cart $cart)
    {
        //
        $data['cart']=$cart;
        $data['product']=Product::all();
        $data['address']=Address::all();
        return view('admin.ecommerce.editCart',$data);
    }

    
    public function update(Request $request, Cart $cart)
    {
        //
        
        $cart->slugid=md5($request->cart .time());
        $cart->product_id=$request->product_id;
        $cart->user_id=$request->user_id;
        $cart->address_id=$request->address_id;
        $cart->save();
        return redirect()->route('cart.index');
    }

    
    public function destroy(Cart $cart)
    {
        //
        $cart->delete();
        return redirect()->route('cart.index');
    }



}
