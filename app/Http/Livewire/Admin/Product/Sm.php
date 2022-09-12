<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\smCategory;
use App\Models\smChapter;
use Livewire\Component;

class Sm extends Component
{

    public $smCat;
    public $smChap = [];
    public $smCatId;
    public $smChapID;

    // public $inputs= [] ;
    // protected $listeners = ['remove_mocktest'=>"remove_mocktest"];

    public $iddd;



    public function removecall($id)
    {
        
        $this->emit('remove_mocktest', $id);
    }


    public function mount($iass)
    {

        $this->iddd = $iass;

        $this->smCat = smCategory::all();
    }

    public function updatedsmCatId()
    {
        
        $this->get_subcategories();
    }

    public function get_subcategories()
    {
        if ($this->smCatId != '') {
            $this->smChap = smChapter::where("sm_categories_id", $this->smCatId)->get();
        }
    }


    public function render()
    {
        return view('livewire.admin.product.sm');
    }
}
