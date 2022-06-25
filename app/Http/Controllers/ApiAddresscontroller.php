<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
class ApiAddressController extends Controller
{
    //
    public function index(){
        return Address::all();
    }
}