<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //  User login and SignUp
    public function signup(Request $req){

        if($req->isMethod("post")){
            $req->validate([
                'name' => 'required',
                'contact' => 'required|unique:users',
                'password' => 'required|min:6'
            ]);

            $user = new User();
            $user->name = $req->name;
           
            $user->email = $req->email;
            $user->contact = $req->contact;
            
            $user->password = Hash::make($req->password); 
            $user->save();

            return redirect()->route("user.login");
           
        }
        else{
            return view("user.Register");
        }
    }

    //user login
    public function login(Request $req){
        if($req->isMethod("post")){

            // $req->validate([
            //     'email' => 'required',
            //     'password' => 'required',
            // ]);

            $auth = $req->only("contact","password");

            if(Auth::guard("web")->attempt($auth)){
                return redirect()->route('user.index');
            }
            else{
                // $req->session()->flash("error","login with incorrect details try again");
                return redirect()->back();
            }
           
            
        }
        return view("user.login");
    }

    public function logout(Request $req){
        // $req->session()->flush();
        // Auth::logout();

        Auth::guard('web')->logout();

        return redirect()->route("user.login");
    }

    // Admin Login And SignUp

    public function adminSignup(Request $request){
        if($request->isMethod("post")){
           
            $admin = new Admin();
            $admin->name = $request->name;
           
            $admin->email = $request->email;
            $admin->contact = $request->contact;
            
            $admin->password = $request->password; 
            $admin->save();

            return redirect()->route("admin.login");
           
        }
        else{
            return view("adminRegister.SignUp");
        }
    }

    public function adminLogin(Request $request){
        if($request->isMethod("post")){

            // $req->validate([
            //     'email' => 'required',
            //     'password' => 'required',
            // ]);

            $auth = $request->only("email","password");
            //  print_r(Auth::guard("admin")->attempt($auth));
            // return dd(Auth::guard("admin"));
            if(Auth::guard("admin")->attempt($auth)){
                
               return redirect()->route('admin.dashboard');
            }
            else{
                $request->session()->flash("error","login with incorrect details try again");
               return redirect()->back();
            }
           
            
        }
        return view("adminRegister.Login");
    }

    public function Adminlogout(Request $req){
        // $req->session()->flush();
        // Auth::logout();

        Auth::guard('admin')->logout();

        return redirect()->route("admin.login");
    }

    

}