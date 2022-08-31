<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Category;
use App\Models\Examination;
use App\Models\SubCategory;
use GuzzleHttp\Psr7\Request;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;

class Mocktest extends Component
{
    public $category;
    public $subcat;
    public $map;
    public $data;
    public $ifLoginData;

    public function checkLogin($id)
    {
        if (Auth::user()) {
            $this->ifLoginData = Examination::where('slugid',$id)->get();

        } else {
            return redirect()->route('user.login');
        }
    }


    public function mount($cat_id, $sub_cat_id)
    {
        $this->category = $cat_id;
        $this->subcat = $sub_cat_id;

        $user_id = 0;
        if (Auth::user()) {
            $user_id = Auth::user()->id;
        } else {
            $user_id = 0;
        }

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

            $this->newData = json_encode($this->data);
            
    }
    public function render()
    {

        return view('livewire.user.mocktest');
    }
}
