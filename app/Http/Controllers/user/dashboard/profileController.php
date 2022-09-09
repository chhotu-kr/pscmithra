<?php

namespace App\Http\Controllers\user\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
class profileController extends Controller
{
    //

    public function update(Request $request){

        $user_id=Auth()->user();

        $user=user::find($user_id);
        $user->name=$request->name;
        $user->contact=$request->contact;
        $user->email=$request->email;
        $user->gender=$request->gender;

        $user->save();

        return redirect()->route('user.profile');
    }
}
