<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
class userController extends Controller
{
  

 
    
        public function update(Request $request){
    
            $user_id = Auth::id();
       
            $user=User::find($user_id);
            $user->name=$request->name;
            $user->contact=$request->contact;
            $user->email=$request->email;
            // $user->password=$request->password;
            // $user->amount=$request->amount;
            $user->image=$request->image;
            $user->gender=$request->gender;
        
            $user->save();
        
            return redirect()->route('user.profile');
        }  

        public function ChangePassword(Request $request){
            $user_id = Auth::id();
            $user=User::find($user_id);
            $user->password = Hash::make($request->password);

            $user->save();
        
            return redirect()->route('user.profile');

        }
}
