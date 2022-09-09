<?php

namespace App\Http\Livewire\User\CategorywithSubcategory;
use Livewire\WithFileUploads;
use Livewire\Component;
use App\Models\User;
class Category extends Component
{

    use WithFileUploads;
    private $user;
   public $name;
   public $contact;
   public $email;
   public $password;
   public $amount;
   public $image;
   public $gender;
public $state;
public $dd=55;
   public function mount(){

    
    //  $this->user=User::all();
    // $this->user=User::find(Auth::User()->id();
    $id = auth()->user()->id;
$this->user = User::where('id',$id);
    $data =$this->user->get()[0];

    $this->name=$data->name;
   $this->contact=$data->contact;
    $this->email=$data->email;
    $this->password=$data->password;
    // $this->amount=$data->amount;
    $this->image=$data->image;
    $this->gender=$data->gender;
   }

   public function updateProfileInformation()
{
    $this->resetErrorBag();

    $this->user->update(auth()->user(),$data);

    session()->flash('status', 'Profile successfully updated');
}
    public function render()
    {
        return view('livewire.user.categorywith-subcategory.category');
    }
}
