<?php

namespace App\Http\Livewire\Sessionalpdf;

use Livewire\Component;
use App\Models\userPdfSubscriptions;
use Auth;
class Pdf extends Component
{  
  public $userPdfSubscriptions;
    public $data =[];
    public function mount(){
        
         
        $user_id=Auth::id();
        $data  =  userPdfSubscriptions::where("user_id", $user_id)->with('pdf')->get();

        if(count($data)!=0){

        
          $this->data = $data->map(function ($item) {
      
            return collect([
              'id' => $item->slugid,
              "name" => $item->pdf->name,
              "On" => $item->pdf->Date,
              "type" => $item->pdf->type,
            ]);
        });
    }
    }
    public function render()
    {
        return view('livewire.sessionalpdf.pdf');
    }
}
