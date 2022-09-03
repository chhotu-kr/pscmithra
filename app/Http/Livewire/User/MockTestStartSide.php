<?php

namespace App\Http\Livewire\User;
use Livewire\Component;

class MockTestStartSide extends Component 
{
    public $data;

    protected $listeners = ['test_data'=> "render"];

    // public function test_data($test_data)
    // {
    //     $this->data = $test_data;
      
    //     // $this->data = $value;
    // }

    public function mount()
    {
        
    }
    public function render()
    {
        return view('livewire.user.mocktest-start-side');
    }
}
