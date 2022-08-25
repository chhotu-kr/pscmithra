<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
class Exam extends Component
{
    public $category;
    public $categoryId;

    public $inputs= [] ;
    protected $listeners = ['remove_mocktest'=>"remove_mocktest"];
public function mount(){
    $this->category=Category::all();

}
 public $livecount;
    public function add($type)
    {
if($type=='Live'){
    if($this->livecount>0){
return;
    }else{
        $this->livecount++;
        $id = count($this->inputs);
        
        $ia['type'] = $type;
        
        $ia['id'] = $id;
        
                  $this->inputs[] = $ia;
    }
}else{
    $id = count($this->inputs);
        
    $ia['type'] = $type;
    
    $ia['id'] = $id;
    
              $this->inputs[] = $ia;
}
        

       

    }

    public function remove_mocktest($id)
    {
      $rrr= $this->inputs[$id];
if($rrr['type']=='Live'){
    $this->livecount--;
}

        unset($this->inputs[$id]);
    }

    public function render()
    {
        return view('livewire.exam');
    }
}
