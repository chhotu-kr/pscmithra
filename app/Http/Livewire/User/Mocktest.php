<?php

namespace App\Http\Livewire\User;

use App\Models\AttempedExam;
use Livewire\Component;
use App\Models\Category;
use App\Models\Examination;
use App\Models\ExamQuestion;
use App\Models\mockattempquestion;
use App\Models\SubCategory;
use GuzzleHttp\Psr7\Request;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;

class Mocktest extends Component
{
    public $category;
    public $subcat;
    public $data;
    public $ifLoginData;

    public $singleData;
    public $returndata;
    public $lang = null;
    public $itemId = null;
    public $checked = false;

    public function itemId($id)
    {
        if(Auth::user()){
            $this->itemId = $id;

        }
        else{
            return redirect()->route('user.login');
        }
    }
    public function selectLang($id)
    {
        $this->lang = $id;
        // dd($id);
        $this->checked = true;
    }
    public function resume($testId){
        // dd($this->data);
        $resumedata = $this->data->where('testId',$testId)->first();
        $examination_id = Examination::select('id', 'time_duration')->where("slugid", $resumedata['id'])->first();
        // dd($examination_id);
        $returndata['data'] = ['testId' => $testId, "examinationId" => $examination_id->id];
        return redirect()->route('view.mockteststart',$returndata);

    }
    public function result($testId){
      
        $resumedata = $this->data->where('testId',$testId)->first();
       
        return redirect()->route('view.mocktestresult', ['testID' => $testId, "examId" => $resumedata['id']]);

    }
    public function prepareExam($singleData)
    {


        $user = Auth::id();
        $examination_id = Examination::select('id', 'time_duration')->where("slugid", $singleData['id'])->first();
        // dd($singleData);

        $get = AttempedExam::where('examinations_id', $singleData['id'])->where('mocktesttype', $singleData['type'])->where('users_id', $user)->first();

        if (empty($get)) {

            $Attemp = new AttempedExam();
            $Attemp->slugid = md5($examination_id->id . time());
            $Attemp->examinations_id = $examination_id->id;
            $Attemp->users_id = $user;
            $Attemp->language_id = $this->lang;
            $Attemp->remain_time = $examination_id->time_duration * 60;
            $Attemp->mocktesttype = "normal"; //here
            $Attemp->save();

            $examQuestion =  ExamQuestion::where('examination_id', $examination_id->id)->pluck('question_id');
            // $insertData = [];
            foreach ($examQuestion as $value) {

                $mock = new mockattempquestion();
                $mock->users_id =  $user;
                $mock->questions_id = $value;
                $mock->attemped_exams_id = $Attemp->id;
                $mock->save(); 

            }
            $this->returndata['data'] = ['testId' => $Attemp->slugid, "examinationId" => $examination_id->id];
            
        } else {

            if ($singleData['type'] == "reattemp") {
                $get->lastQues = 0;
                $get->type = "resume";
                $get->language_id = $this->lang;
                $get->remain_time = $examination_id->time_duration * 60;
                $get->save();

                $testId = $get->id;
                $data =   mockattempquestion::where('attemped_exams_id', $testId)->where('users_id', $user)->update([
                    "QuesSeen" => "false",
                    "QuesSelect" => "",
                    "time" => 0,
                ]);

                $this->returndata['data'] = ['testId' => $get->slugid];

                // return response()->json(['msg' => 'Exam Created', 'status' => true, 'data' => ['testId' => $get->slugid]]);
            } else {

                return response()->json(['msg' => 'Exam already exist', 'status' => false]);
            }
        }
        //   mockattempquestion::insert($insertData);
        return redirect()->route('view.mockteststart', $this->returndata);
    }


    public function checkLogin()
    {

        if ($this->itemId != null) {
            if (Auth::user()) {
                $this->singleData =  $this->data->where('id', $this->itemId)->first();

                if ($this->singleData['type'] == "Start") {
                    if ($this->lang != null) {
                        $this->prepareExam($this->singleData);
                    } else {
                        return session()->flash('select', 'Select a language');
                    }
                } else if ($this->singleData['type'] == "Prepare") {
                    return dd($this->singleData['name']);
                }
            } else {
                return redirect()->route('user.login');
            }
        }
    }


    public function mount($cat_id, $sub_cat_id)
    {
        $this->category = $cat_id;
        $this->subcat = $sub_cat_id;
        $user_id = Auth::id();

        $this->data = Examination::where('category_id', $cat_id)->where('subcategory_id', $sub_cat_id)
            ->with('category', 'subcategory', 'lang.language')->with(['attm' => function ($q) use ($user_id) {
                $q->where('users_id', $user_id)->where('mocktesttype', 'normal');
            }])->get()
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
    }
    public function render()
    {

        return view('livewire.user.mocktest');
    }
}
