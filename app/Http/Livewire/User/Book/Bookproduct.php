<?php

namespace App\Http\Livewire\User\Book;

use Livewire\Component;
use App\Models\Product;
class Bookproduct extends Component
{

    public $product;
    public $productId;
    //  public $type;
    public function mount($item){
        
        
        
        //    $this->$type=type;
        // $ia['type']=$type;
        $this->product=Product::where('type',$item)->get();
    }
    public function render()
    {
     
        return view('livewire.user.book.bookproduct');
    }
}
