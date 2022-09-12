<?php

namespace App\Http\Livewire\Admin\Product;

use Livewire\Component;

use App\Models\QuizCategory;
use App\Models\QuizChapter;
use App\Models\QuizTopic;
use App\Models\QuizSubCategory;
class Quiz extends Component
{
    public $iddd;
    public $quizcategoryId;

    public $quizsubcategoryId;
    public $quizsubcategories = [];
    
    
    
    public $quizchapters = [];
    public $quizchapter_id;

    public $quiztopics=[];
    public function mount($iass){
        $this->iddd = $iass;

        $this->quizcategory= QuizCategory::all();
        $this->get_quizsubcategories();
    }

    public function removecall($id)
    {
        
        $this->emit('remove_mocktest', $id);
    }

public function updatedquizcategoryId(){
    $this->quizsubcategories = QuizSubCategory::where("quiz_categories",$this->quizcategoryId)->get();
}

    public function updatedquizchapterId(){


        $this->quiztopics= QuizTopic::where("quiz_chapters",$this->quizchapter_id)->get();
    }

    public function updatedquizsubcategoryId(){
        $this->quizchapters = QuizChapter::where("quiz_sub_categories",$this->quizsubcategoryId)->get();
      
       
    }
    // public function updatedQuizSubCategoryId(){
    //     $this->get_quizchapters();
    // }

   
    public function get_quizsubcategories(){
        if($this-> quizcategoryId != ''){
            $this->quizsubcategories = QuizSubCategory::where("quiz_categories",$this->quizcategoryId)->get();
        }
    }

    public function get_quizchapters(){
        if($this->quizsubcategoryId != ''){
        
        }
    }
    
    
    public function render()
    {
        return view('livewire.admin.product.quiz');
    }


}
