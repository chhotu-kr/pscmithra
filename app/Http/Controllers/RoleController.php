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

    //.................AddRole.................//

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
return redirect('/xyz@123/role');



}

public function editRole($id){
$data['rol']=Role::find($id);
$permint = array();
$data['data'] = $permint;
return view('role.editaddRole',$data);

}

public function updateRole(Request $request,$id){

    $rol=Role::find($id);
    $rol->name = $request->name;
    $rol->slug = str_replace(" ","-",strtolower($request->name));
    
    $rol->save();
    Role::whereId($rol->id)->first()->permissions()->attach($request->per);
    $permi = Permission::find($id);
    $permint = array();
    foreach ($permi  as $item) {
        $a = explode('-', $item->slug);
        $permint[$a[1]][]=$item;  
    }
    
    $data['data'] = $permint;

    return redirect('/xyz@123/role');
}

//..........................Admin.....................//
    public function getAdmin()
    {
        $data['role'] = Role::all();

        return view('role.addAdmin', $data);
    }

    public function store(Request $request)
    {
        //  return dd($request);
        $data = new Admin();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->contact = $request->contact;
        $data->slugid=md5($request->admin .time());
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

    public function edit($id){
    $data['admin']=Admin::find($id);
    $data['role']=Role::find($id);
    $data['roles']=Role::all();

    return view('role.editAddAdmin',$data);
    }

    public function update(Request $request,$id){
        $data = Admin::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->contact = $request->contact;
        $data->slugid=md5($request->admin .time());
        $data->password = Hash::make($request->password);
        $data->save();
        // $role = new users_roles();
        $role=Role::find($id);
        // $role->admin_id = $data->id;
        $role->name = $request->name;
        $role->timestamps = false;
        $role->save();
        return redirect()->route('store.role');
    }

    public function destroy($slug){
    $req=Admin::where('slugid',$slug)->first();
    if (!empty($req)) {
        $req->delete();
        session()->flash('success', 'Service has been deleted !!!');
    } else {
        session()->flash('error', 'Please try again !!!');
    }

    return redirect()->route('store.role');
    }

}
