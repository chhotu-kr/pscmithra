<?php

namespace App\Http\Controllers\user\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Auth;
class profileController extends Controller
{
    //

    public function update(Request $request){

        $id=Auth()->user();
         $user_id=Auth::user($id);

        //  dd($user_id);
        $user=User::find($user_id->id);
        $user->name=$request->name;
        $user->contact=$request->contact;
        $user->email=$request->email;
        $user->gender=$request->gender;

        $user->save();

        return redirect()->route('user.profile');
    }
}
