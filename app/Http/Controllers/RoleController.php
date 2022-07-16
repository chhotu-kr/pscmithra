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
    public function getRole(){
        $role=Role::all();

        return view('role.manageRole',compact('role'));
    }

    public function get_Addrole(){
        $permi=Permission::all();
        $data= array();
        $i=0;
        $permint=array();
foreach($permi  as $item){
    $a = explode ('-',$item->slug);
    if (in_array($a[1], $permint)==false) {
$permint[]= $a[1];
$data[$i]['name']= $a[1];

foreach($permi  as $itemd){

    print_r( $itemd->slug);
    $contains = Str::contains($a[1], $itemd->slug);
    echo $contains;
if($contains){
    $data[$i]['per']=$itemd;
}
}
$i++;
    }
   
    echo json_encode($data);




}


     //   return view('role.addRole',$permi);
    }
    public function getAdmin(){
        $data['role']=Role::all();

        return view('role.addAdmin',$data);
    }

    public function store(Request $request){
        // return dd($request);
        $data= new Admin();
        $data->name=$request->name;
        $data->email=$request->email;
        $data->contact=$request->contact;
        $data->password= Hash::make($request->password); 
        $data->save();
        $role = new users_roles();
        $role->admin_id=$data->id;
        $role->role_id=$request->role;
        $role->timestamps=false;
        $role->save();
        return redirect('/addadmin');

        // 
    }

    // admin store.......

    public function adminRole(){
        $data['admin']=Admin::all();

        return view('role.admin',$data);
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
