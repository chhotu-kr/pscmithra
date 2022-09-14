<?php

namespace App\Http\Livewire\User;

use App\Models\Address;
use App\Models\Cart;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CartCard extends Component
{
    public $name,$state,$city,$pincode,$street,$type,$landmark;
    public $order;
    public $address;
    public $status;
    public $addressSelected = null;
    public function changeStatus()
    {
        $this->status = !$this->status;
    }
    public function address()
    {
        $user_id = Auth::id();
        $this->address = Address::where('user_id', $user_id)->get();
    }
    public function addressSelect($id)
    {
        $this->addressSelected = $id;
        // dd($id);
    }
    public function mount()
    {
        $user_id = Auth::id();
        $this->order = Cart::where('user_id', $user_id)->get();
        $this->address();
    }

    public function removeitemfromCart($id)
    {
        $user_id = Auth::id();
        $item = Cart::where([['user_id', $user_id], ['products_id', $id]])->first();

        $item->delete();
        $this->mount();
    }
    public function emptyAdd(){
        $this->name = '';
        $this->state = '';
        $this->city = '';
        $this->pincode = '';
        $this->street = '';
        $this->landmark = '';
        $this->type = '';
    }
    public function addAddress()
    {
        $data = $this->validate([
            'name'=>'required',
            'state'=>'required',
            'city'=>'required',
            'pincode'=>'required',
            'street'=>'required',
            'type'=>'required',
            'landmark'=>'nullable',
        ]);
    
        $user_id = Auth::id();
        $addres = new Address();
        $addres->name = $data['name'];
        $addres->state = $data['state'];
        $addres->city = $data['city'];
        $addres->pincode = $data['pincode'];
        $addres->street = $data['street'];
        $addres->user_id = $user_id;
        if (empty($data['landmark'])) {
            $addres['landmark'] = $data['landmark'];
        }
        $addres->slugid = md5($user_id . time());
        $addres->type = $data['type'];
        $addres->save();
        $this->address();
        $this->emptyAdd();
    }
    public function checkout()
    {
    }
    public function render()
    {
        return view('livewire.user.cart-card');
    }
}
