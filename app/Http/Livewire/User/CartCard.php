<?php

namespace App\Http\Livewire\User;

use Anand\LaravelPaytmWallet\Facades\PaytmWallet;
use App\Models\Address;
use App\Models\Cart;
use App\Models\coupon;
use App\Models\order;
use App\Models\orderItem;
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
    public $total ,$array;

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
            $user_id = Auth::user();
              $data = Cart::where("user_id", $user_id->id)->with('product')->get();
          
              if (count($data) == 0) {
                session()->flash('add', 'Add Item to checkout');
              } else {
                $array = [];
          
                $order = new order();
                if ($this->total['cstatus'] == true) {
                  $order->coupon_id = $this->total['coupon_id'];
                }
                $order->address_id = $this->addressSelected;
                $order->dateofordered = strtotime("now");
                $order->user_id = $user_id->id;
                $order->gst = $this->total['gst'];
                $order->discount = $this->total['discount'];
                $order->total =$this->total['total'];
                $order->slugid = md5($user_id->id . time());
                  $saved =  $order->save();
          
                // return dd($data);
                foreach ($data as $value) {
                  $orderItem = new orderItem();
                  $orderItem->orders_id = $order->id;
                  $orderItem->products_id = $value->product->id;
                  $orderItem->save();
                }
                $this->array['total'] = 1;
                $this->array['checksum'] = "asdsadasdasdas";
                $this->array['orderid'] = $order->slugid;
              
              if($saved){
                return redirect()->route('makePayment',$this->array);
              }

              }
             
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
                    $array['coupon_id'] = $coupon->id;
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
            $array['discount'] = $dicount;
            $array['total'] = ( $total + $gst) - $dicount;
            $array['cart'] = $data;

            $this->total = $array;

        }
    }
 
    public function render()
    {
        return view('livewire.user.cart-card');
    }
}
