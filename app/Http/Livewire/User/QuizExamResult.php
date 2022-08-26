<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Examination;
use App\Models\User;
use GuzzleHttp\Psr7\Request;

class QuizExamResult extends Component
{
    public $examination;
    public $examinationId;

//    public $ibcd;

    public function mount(){

        // $this->ibcd=$category_id;
        // $this->ibcd=$subcategory_id;
     $user_id=auth()->user(null);
        $data = Examination::where('category_id', $category_id)->where('subcategory_id', $subcategory_id)
        ->with('category', 'subcategory', 'lang.language')->with(['attm' => function ($q) use ($user_id) {
            $q->where('users_id', $user_id->id)->where('mocktesttype', 'normal');
        }])

        ->get()
        ->map(function ($item) {
            $free = $item->isFree;
            $type = "Buy";
            $TestID = "";

            if (empty($item->attm)) {

                if ($free) {
                    $type = "Start";
                    $TestID = "";
                } else {
                }
            } else {
                $type = $item->attm->type;
                $TestID =  $item->attm->slugid;
            }
            return collect([
                "testId" => $TestID,
                "id" => $item->slugid,
                "categoryId" => $item->category->id,
                "name" => $item->exam_name,
                "categoryName" => $item->category->category,
                "subbCategoryId" => $item->subcategory->id,
                "subCategoryName" => $item->subcategory->subcategory,
                "totalTimeinMints" => $item->time_duration,
                "totalQues" => $item->noQues,
                "type" => $type,
                "totalTimeinMints" => $item->time_duration,
                "languages" => $item->lang->map(function ($lang) {
                    return collect([
                        "name" => $lang->language->languagename,
                        "id" => $lang->language->id
                    ]);
                })
            ]);
        });
    // return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $data]);

       
    
    
    }
    public function render()
    {
        dd('$item');
        return view('livewire.user.quiz-exam-result');
    }
}
