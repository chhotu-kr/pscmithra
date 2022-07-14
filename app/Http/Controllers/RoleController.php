<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    //
    public function getRole(){
        $role=Role::all();

        return view('role.manageRole',compact('role'));
    }
    public function getAdmin(){
        $data['role']=Role::all();

        return view('role.addAdmin',$data);
    }

    public function store(Request $request){
        $data= new Role();
        $data->name=$request->name;
        $data->slug=$request->slug;
        $data->save();
        return redirect('/role');
    }

    // admin store.......

    public function adminRole(){
        $data['admin']=Admin::all();
        return view('role.admin',$data);
    }
    public function StoreAdminRole(Request $request){
        $data= new Admin();
        $data->name=$request->name;
        $data->email=$request->email;
        $data->contact=$request->contact;
        $data->password= Hash::make($request->password); 
        $data->save();
        return redirect('/adminstore');
    }
    
}
