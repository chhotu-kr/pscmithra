<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Admin;
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
    
}
