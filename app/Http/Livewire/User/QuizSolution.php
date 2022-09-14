<?php

namespace App\Http\Livewire\User;

use App\Models\quizAttemp;
use App\Models\QuizExamination;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class QuizSolution extends Component
{
    public $data;
    public $status = false;
    public $question_no;
    public $w = 0;
    public $a = 0;
    public $u = 0;

    public function statusChange(){
        $this->status = !$this->status;
      }
    function filterledgers()
    {
        $w = 0;
        $a = 0;
        $u = 0;

        foreach ($this->data['questionslist'] as $value) {
            if ($value['s'] == "false") {
                $u++;
            } else {
                if ($value['optSel'] != $value['isRightAns']) {
                    $w++;
                } else {
                    $a++;
                }
            }
        }

        $this->a = $a;
        $this->w = $w;
        $this->u = $u;
    }
    public function next()
    {
        $this->question_no++;
    }
    public function prev()
    {
        $this->question_no--;
    }
    public function jump($index)
    {

        $this->question_no = $index;
    }
    public function mount($testid, $examinationId)
    {


        $user_id = Auth::id();
        $quiz_examinations_id =  QuizExamination::select('id')->where("slugid", $examinationId)->first();



        $testId = quizAttemp::select('id')->where("slugid", $testid)->first();



        $this->data = quizAttemp::with(['examination.quizexamQ.question.quizAttemp' => function ($q) use ($testId, $user_id) {
            $q->where('quiz_attemps_id', $testId->id)->where('users_id', $user_id);
        }])->where('slugid', $testid)->where('users_id', $user_id)->where('quiz_examinations_id', $quiz_examinations_id->id)
            ->get()
            ->map(function ($d) {



                if ($d['type'] == "resume") {
                    return "Test resume";
                } else if ($d['type'] == "result") {

                    return collect([
                        "testID" => $d->slugid,
                        "languageId" => $d->language->id,
                        "languageName" => $d->language->languagename,
                        "languages" => $d->examination->lang->map(function ($langg) {

                            return [
                                "id" => $langg->language->id,
                                "language" => $langg->language->languagename,
                            ];
                        }),
                        "quizid" => $d->examination->slugid,
                        "lastQues" => $d->lastQues,
                        "type" => $d->mocktesttype,
                        "lastQues" => $d->lastQues,
                        "time" => $d->remain_time,
                        "wMarks" => $d->examination->wrongmarks,
                        "rMarks" => $d->examination->rightmarks,
                        'noQues' => $d->examination->noQues,
                        "questionslist" => $d->examination->quizexamQ->map(function ($fff) {
                            $aaa = "";
                            if ($fff->question->rightans === $fff->question->quizAttemp->QuesSelect) {
                                $aaa = true;
                            } else {
                                $aaa = false;
                            }
                            return collect([
                                "questionId" => $fff->question->id,
                                "s" => $fff->question->quizAttemp->QuesSeen,
                                "optSel" => $fff->question->quizAttemp->QuesSelect,
                                "time" => $fff->question->quizAttemp->time,
                                "isRight" => $aaa, "isRightAns" => $fff->question->rightans,
                                "question" => $fff->question->secondquestion

                                    ->map(function ($ques) {
                                        return collect([
                                            "id" => $ques->language->id,
                                            "language" => $ques->language->languagename,
                                            "question" => $ques->question,
                                            "option1" => $ques->option1,
                                            "option2" => $ques->option2,
                                            "option3" => $ques->option3,
                                            "option4" => $ques->option4,
                                            "direction" => $ques->direction,


                                            "explain" => $ques->explanation,
                                        ]);
                                    })

                            ]);
                        })
                    ]);
                }
            })[0];
        $this->question_no = 0;
        $this->jump($this->question_no);
        $this->filterledgers();
        // dd($this->data);
        // return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $data]);
    }

    public function render()
    {
        return view('livewire.user.quiz-solution');
    }
}
