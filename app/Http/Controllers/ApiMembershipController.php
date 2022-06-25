<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MemberShip;
class ApiMembershipController extends Controller
{
    //
    public function index(){
        return MemberShip::all();
    }
}
