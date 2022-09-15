<?php

namespace App\Http\Livewire\User;

use App\Models\Address;
use App\Models\Cart;
use App\Models\coupon;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CartCard extends Component
{
    public $name, $state, $city, $pincode, $street, $type, $landmark,$code;
    public $order;
    public $address;
    public $status;
    public $addressSelected = null;
    public $total;

public function updatedcode(){
    $this->carttotal();
}

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
        $this->mount();
        // dd($id);
    }
    public function mount()
    {
        $user_id = Auth::id();
        $this->order = Cart::where('user_id', $user_id)->get();
        $this->address();
        $this->carttotal();
    }

    public function removeitemfromCart($id)
    {
        $user_id = Auth::id();
        $item = Cart::where([['user_id', $user_id], ['products_id', $id]])->first();

        $item->delete();
        $this->mount();
    }
    public function emptyAdd()
    {
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
            'name' => 'required',
            'state' => 'required',
            'city' => 'required',
            'pincode' => 'required',
            'street' => 'required',
            'type' => 'required',
            'landmark' => 'nullable',
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
        if ($this->addressSelected == null) {
            session()->flash('add', 'Please select a address to checkout');
        } else {
            dd("checkout");
        }
    }
    public function carttotal()
    {

        $user_id = Auth::id();
        $data = Cart::where("user_id", $user_id)->with('product')->get();

        if (empty($data)) {
            return response()->json(['msg' => 'Empty Cart', 'status' => false]);
        } else {
            $array = [];
           
            if (!empty($this->code)) {
                $coupon = coupon::where('code', $this->code)->where('status', false)->first();
                if (empty($coupon)) {
                    $array['cmsg'] = "Invalid Coupon";
                    $array['cstatus'] = false;
                    session()->flash('coupon','<p class="text-danger">Invalid Coupon!</p>');
                } else {
                    $array['cmsg'] = "Valid Coupon";
                    $array['cstatus'] = true;
                    session()->flash('coupon','<p class="text-success">Valid Coupon!</p>');

                }
            } else {
                $array['cmsg'] = "Coupon Not Found";
                $array['cstatus'] = false;
                // session()->flash('coupon','<p class="text-danger">Invalid Coupon!</p>');
            }

            $total = $data->sum(function ($product) {
                return $product->product->price;
            });
            $dicount =  0;
            if (!empty($coupon)) {
                $dicount = ($total / 100) * $coupon->percent;
                $total = $total - $dicount;
            }

           
            $gst = ($total / 100) * 18;
            $array['gst'] = $gst;
            $array['totalAmount'] = $total;
            $array['discount'] = $dicount;
            $array['payableAmount'] = ( $total + $gst) - $dicount;
            $array['cart'] = $data;

            $this->total = $array;

        }
    }
 
    public function render()
    {
        return view('livewire.user.cart-card');
    }
}
