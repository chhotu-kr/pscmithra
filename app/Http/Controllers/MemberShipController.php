<?php

namespace App\Http\Controllers;

use App\Models\MemberShip;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MemberShipController extends Controller
{
    
    public function index()
    {
        //
        $data['membership']= MemberShip::all();
        return view('admin.ecommerce.manageMembership',$data);
      
    }

    
    public function create()
    {
        //
        $data['membership']= MemberShip::all();
        return view('admin.ecommerce.insertMemberShip',$data);
    }

    
    public function store(Request $request)
    {
        //
        $data = new MemberShip();
        $data->slugid=md5($request->nooftest .time());
        $data->price=$request->price;
        $data->validity=$request->validity;
        $data->name=$request->name;
        $data->nooftest=$request->nooftest;
        $data->details=$request->details;
        $data->save();
        return redirect()->route('membership.index');
    }

    public function show(MemberShip $membership)
    {
        //
    }

    
    public function edit(MemberShip $membership)
    {
        //
        $data['membership']=$membership;
        return view('admin.ecommerce.editMembership',$data);
    }

    public function update(Request $request, MemberShip $membership)
    {
        //
      
        $membership->slugid=md5($request->nooftest .time());
        $membership->price=$request->price;
        $membership->validity=$request->validity;
        $membership->name=$request->name;
        $membership->nooftest=$request->nooftest;
        $membership->details=$request->details;
        $membership->save();
        return redirect()->route('membership.index');
    }

    
    public function destroy(MemberShip $membership)
    {
        //
        // $item = MemberShip::where('slugid',$slug)->first();
        
        // if(!empty($item)){
        //     $item->delete();
        //     session()->flash('success', 'Service has been deleted !!!'); 
        // }

        // else{
        //     session()->flash('error', 'Please try again !!!');
        // } 
          $membership->delete();
        return redirect()->route('membership.index'); 
    }
}
