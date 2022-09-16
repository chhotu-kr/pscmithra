<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class userController extends Controller
{
    //

    public function index(){
        $data['subuser']=User::all();
        return view('admin.user.manageuser',$data);
    }

    public function create(){
        $data['subuser']=User::all();
        return view('admin.user.insertUser',$data);
    }

    public function store(Request $request){
        $data= new User();
        $data->name=$request->name;
        $data->email=$request->email;
        $data->contact=$request->contact;
        $data->password=Hash::make($request->password);
    
        $filename = $request->image->getClientOriginalName();
        $request->image->move(('upload'),$filename);
        $data->image = $filename;
        
        $data->amount=$request->amount;
        $data->gender=$request->gender;
        $data->type=$request->type;
        $data->save();

        return redirect()->route('manage.user');
    }

    public function edit($id){
         $data['subuser']=User::find($id);
        // dd($data);
        return view('admin.user.editUser',$data);
    }

    public function update(Request $request,$id){
        // $id=Auth()->user();
        // $user_id=Auth::user($id);
        $subuser=User::find($id);
        $subuser->name=$request->name;
        $subuser->email=$request->email;
        $subuser->contact=$request->contact;
        $subuser->password=$request->password;
       
        $subuser->image=$request->image;
        $subuser->amount=$request->amount;
        $subuser->gender=$request->gender;
        $subuser->type=$request->type;
        $subuser->save();
       
        return redirect()->route('manage.user');
    }

    public function destroy($slug){
        $sub=User::where('slugid',$slug)->first();
        if(!empty($sub)){
            $sub->delete();

            session()->flash('success', 'Service has been deleted !!!'); 
        }
        else{
            session()->flash('error', 'Please try again !!!');
        }

        return redirect()->route('manage.user');
    }
}
