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
 
    public function add($type)
    {

        

        $id = count($this->inputs);
        
$ia['type'] = $type;
$ia['id'] = $id;

          $this->inputs[] = $ia;

    }

    public function remove_mocktest($id)
    {
     
        
        unset($this->inputs[$id]);
    }

    public function render()
    {
        return view('livewire.exam');
    }
}
