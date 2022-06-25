<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Product;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    
    public function index()
    {
        //
        $data['product']=Product::all();
        $data['address']=Address::all();
        return view('admin.ecommerce.manageAddress',$data);
    }

   
    public function create()
    {
        //
        $data['address'] = Address::all();
        $data['product'] = Product::all();
        return view('admin.ecommerce.insertAddress',$data);
    }

    
    public function store(Request $request)
    {
        //
        $data= new Address();
        $data->product_id=$request->product_id;
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
        $data['product']=Product::all();
        return view('admin.ecommerce.editAddress',$data);
        
    }

    
    public function update(Request $request, Address $address)
    {
        //
        
        $address->product_id=$request->product_id;
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
        // 
        // $item = Address::where('slugid',$slug)->first();
        
        // if(!empty($item)){
        //     $item->delete();
        //     session()->flash('success', 'Service has been deleted !!!'); 
        // }

        // else{
        //     session()->flash('error', 'Please try again !!!');
        // } 
       $address->delete();
        return redirect()->route('address.index');
    }
}
