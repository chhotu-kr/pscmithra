<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    
    public function index()
    {
        //
        $data['subuser']=User::all();
        $data['product']=Product::all();
        $data['address']=Address::all();
        return view('ecommerce.manageAddress',$data);
    }

   
    public function create()
    {
        //
        $data['subuser']=User::all();
        $data['address'] = Address::all();
        $data['product'] = Product::all();
        return view('ecommerce.insertAddress',$data);
    }

    
    public function store(Request $request)
    {
        //
        $data= new Address();
        $data->product_id=$request->product_id;
        $data->user_id=$request->user_id;
        $data->slugid=md5($request->address .time());
        $data->name=$request->name;
        $data->state=$request->state;
        $data->city=$request->city;
        $data->pincode=$request->pincode;
        $data->save();
        return redirect()->route('address.index');
    }

    
    public function show(Address $address)
    {
        //
    }

    public function edit(Address $address)
    {
        //
        $data['address']=$address;
        $data['subuser']=User::all();
        $data['product']=Product::all();
        return view('ecommerce.editAddress',$data);
        
    }

    
    public function update(Request $request, Address $address)
    {
        //
        
        $address->product_id=$request->product_id;
        $address->user_id=$request->user_id;
        $address->slugid=md5($request->address .time());
        $address->name=$request->name;
        $address->state=$request->state;
        $address->city=$request->city;
        $address->pincode=$request->pincode;
        $address->save();
        return redirect()->route('address.index');
    }

    public function destroy(Address $address)
    {
       
       $address->delete();
        return redirect()->route('address.index');
    }
}
