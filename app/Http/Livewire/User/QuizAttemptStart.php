<?php

namespace App\Http\Livewire\User;

use App\Models\quizAttemp;
use App\Models\QuizExamination;
use Livewire\Component;

class QuizAttemptStart extends Component
{

    public $data;
    public $question_no;

    public $w = 0;
    public $a = 0;
    public $u = 0;
    public $required_timing = 0;
    public $min;
    public $sec;
    public $status;
    public $l;
    protected $listeners = ['totaltime' => 'timetaken'];

    public function statusChange()
    {
        $this->status = !$this->status;
    }
    function timetaken()
    {
        $this->min = floor($this->required_timing / 60);
        $this->sec = $this->required_timing % 60;
        $this->required_timing--;
        $this->data['questionslist'][$this->question_no]['time']++;
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
                if (empty($value['optSel'])) {
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
        $this->ishow();
    }
    public function jump($index)
    {

        $this->question_no = $index;
        $this->ishow();
        $this->countTime($this->question_no);
    }
    public function ishow()
    {
        $this->data['questionslist'][$this->question_no]['s'] = "true";
        $this->filterledgers();
    }

    public function prev()
    {
        $this->question_no--;
        $this->ishow();
        $this->countTime($this->question_no);
    }

    public function onSelect($id)
    {
        $this->data['questionslist'][$this->question_no]['optSel'] = $id;
        $this->filterledgers();
    }
    public function countTime($id)
    {


        $this->data['questionslist'][$id]['time'] = $this->data['questionslist'][$id]['time'] + 1;

        // dd($id);
    }
    public function mount($testId, $examinationId)
    {
        $quiz_examinations_id =  QuizExamination::select('id')->where("id", $examinationId)->first();
        $test =  quizAttemp::select('id')->where("slugid", $testId)->first();
        // dd($quiz_examinations_id);

        $user = 1;
        $this->data = quizAttemp::with(['examination.quizexamQ.question.quizAttemp' => function ($q) use ($test, $user) {
            $q->where('quiz_attemps_id', $test->id)->where('users_id', $user);
          }])->where('slugid', $testId)->where('users_id', $user)->where('quiz_examinations_id', $quiz_examinations_id->id)
            ->get()
            ->map(function ($d) {
      
              if ($d['type'] != "resume") {
                return "Test not resume";
              } else if ($d['type'] = "resume") {
      
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
                    return collect([
                        'showdir' => false,
                      "questionId" => $fff->question->id,
                      "s" => $fff->question->quizAttemp->QuesSeen,
                      "optSel" => $fff->question->quizAttemp->QuesSelect,
                      "time" => $fff->question->quizAttemp->time,
                      "question" => $fff->question->secondquestion
      
                        ->map(function ($ques) {
                          return collect([
                            "id" => $ques->language->id,
                            "language" => $ques->language->languagename,
                            "question" => $ques->question,
                            "option1"=> $ques->option1,
                            "option2"=> $ques->option2,
                            "option3"=> $ques->option3,
                            "option4"=> $ques->option4,
                            "direction"=>$ques->direction,
                            
                          ]);
                        })
      
                    ]);
                  })
                ]);
              }
            })[0];
        // dd($this->data);
        $this->question_no = 0;
        $this->jump($this->question_no);
        $this->countTime($this->question_no);
        $this->required_timing = $this->data['time'];
        $this->status = $this->data['questionslist'][$this->question_no]['showdir'];
        //    dd($this->question_no);
        //     dd($this->data);
    }
    public function render()
    {
        return view('livewire.user.quiz-attempt-start');
    }
}