<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class UserRegister extends Component
{
    public $name, $email, $password, $contact;
    public $otpmodal = false;
    public $otpData;
    public $otp,$data;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required',
        'contact' => 'required|min:10',
    ];
    public function resetotp(){
        $this->otp = '';
    }
    public function back(){
        $this->otpmodal = false;
        $this->resetotp();
    }
    public function getotpverify(){
        $response = Http::get('https://2factor.in/API/V1/4e2ac173-2ffa-11ed-9c12-0200cd936042/SMS/VERIFY/'.$this->otpData.'/'. $this->otp );

        $area = json_decode($response->body(), true);
      
        if ($area['Status'] == "Success") {
           $user = new User();
            $user->name = $this->data['name'];  
            $user->email = $this->data['email'];
            $user->contact = $this->data['contact'];
            $user->password = Hash::make($this->data['password']);
            $user->save();
            $this->resetotp();
            return redirect()->route('user.login');
        } else {
            session()->flash('otp','Invalid Otp');
        }
    }
    public function register()
    {
        $this->data = $this->validate();

        $no = User::where('contact', $this->data['contact'])->first();
        if ($no) {
            session()->flash('msg', 'Contact Already Exists!');
        } else {

            $response = Http::get('https://2factor.in/API/V1/4e2ac173-2ffa-11ed-9c12-0200cd936042/SMS/+91' . $this->data['contact'] . '/AUTOGEN/defalut');
            $area = json_decode($response->body(), true);
            if ($area['Status'] == "Success") {
                $this->otpData = $area['Details'];
                $this->otpmodal = true;
            } else {
                session()->flash('msg', 'An error has occured!!');
            }

        }
    }
    public function render()
    {
        return view('livewire.user.user-register');
    }
}
