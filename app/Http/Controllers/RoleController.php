<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Permission;
use App\Models\Admin;
use App\Models\users_roles;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    //
    public function getRole()
    {
        $role = Role::all();

        return view('role.manageRole', compact('role'));
    }

    public function get_Addrole()
    {
        $permi = Permission::all();
        $permint = array();
        foreach ($permi  as $item) {
            $a = explode('-', $item->slug);
            $permint[$a[1]][]=$item;  
        }
        
        $data['data'] = $permint;

        return view('role.addRole',$data);
    }

    public function store_role (Request $request){

$role = new Role();
$role->name = $request->name;
$role->slug = str_replace(" ","-",strtolower($request->name));

$role->save();

Role::whereId($role->id)->first()->permissions()->attach($request->per);
return redirect('/role');



}
    public function getAdmin()
    {
        $data['role'] = Role::all();

        return view('role.addAdmin', $data);
    }

    public function store(Request $request)
    {
         return dd($request);
        $data = new Admin();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->contact = $request->contact;
        $data->password = Hash::make($request->password);
        $data->save();
        $role = new users_roles();
        $role->admin_id = $data->id;
        $role->role_id = $request->role;
        $role->timestamps = false;
        $role->save();
        return redirect()->route('store.role');

        // 
    }

    // admin store.......

    public function adminRole()
    {
        $data['admin'] = Admin::all();

        return view('role.admin', $data);
    }
    // public function StoreAdminRole(Request $request){
    //     $data= new Admin();
    //     $data->name=$request->name;
    //     $data->email=$request->email;
    //     $data->contact=$request->contact;
    //     $data->password= Hash::make($request->password); 
    //     $data->save();



    //     // return dd($data->id);
    //     return redirect('/admin');
    // }

}
