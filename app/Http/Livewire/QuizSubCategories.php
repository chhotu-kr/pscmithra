<?php

namespace App\Http\Livewire;

use App\Models\QuizSubCategory;
use App\Models\QuizChapter;
use App\Models\QuizTopic;
use Livewire\Component;

class QuizSubCategories extends Component
{
    // public $quizcategory;
    // public $quizsubcategories = [];
    // public $quizcategoryId;
    // public $quizsubcategory_id;
    // public $quizchapter;
    // public $quizchapters = [];
   
    // public $quizchapterId;
   

    // public function mount(){

      
    //     $this->quizsubcategory= QuizSubCategory::all();
       

    //     $this->get_quizsubcategories();
    // }
 

    // public function updatedQuizCategoryId(){
    //     $this->get_quizsubcategories();
    // }
    // public function updatedQuizSubCategoryId(){
    //     $this->get_quizchapters();
    // }

    // public function get_quizchapters(){
    //     if($this->quizsubcategoryId != ''){
    //         $this->quizchapters= QuizChapter::where("quiz_sub_categories",$this->quizsubcategoryId)->get();
    //     }
    // }

    // public function get_quizsubcategories(){
    //     if($this->quizcategoryId != ''){
    //         $this->quizsubcategories= QuizSubCategory::where("quiz_categories",$this->quizcategoryId)->get();
    //     }
    // }
    public function render()
    {
        return view('livewire.quiz-sub-categories');
    }
}
