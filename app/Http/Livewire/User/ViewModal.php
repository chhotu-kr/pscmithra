<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ViewModal extends Component
{
    public $contact, $password, $name,$email;
    public $status = false;

    protected function rules()
    {
        return [
           'contact' => 'required',
           'password' => 'required'
        ];
    }

    public function status(){
        $this->resetInput();
        $this->status = !$this->status;
       
    }
    
    public function resetInput()
    {
        $this->contact = '';
        $this->password = '';
        $this->name = '';
        $this->email = '';
    }

    public function saveUser(){

        $validatedData = $this->validate();

            if(Auth::guard("web")->attempt($validatedData)){
                $this->resetInput();
                $this->dispatchBrowserEvent('close-modal');
            }
            else{
                // $req->session()->flash("error","login with incorrect details try again");
              session()->flash('msg',"login with incorrect details try again");
              $this->password = '';
            }  
      
    }
    public function register(){
        $data =  $this->validate([
            'name' => 'required',
            'password' => 'required|min:6',
            'contact' => 'required|unique:users',
            'email' => 'required'
        ]);
       
        $user = new User();
        $user->name = $data['name'];
       
        $user->email =  $data['email'];
        $user->contact =  $data['contact'];
        
        $user->password = Hash::make( $data['password']);
        // $user->amount = $req->amount;
        // $user->gender = $req->gender;
        // $user->image = $req->image; 
        $user->save();
        $this->status();
        session()->flash('msg',"User created!");

        
    }
    public function render()
    {
        return view('livewire.user.view-modal');
    }
}