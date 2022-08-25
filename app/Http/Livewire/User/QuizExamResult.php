<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\AttempedExam;
class QuizExamResult extends Component
{
    public $attempedExam;
    public $attempedExamId;

  
   
    public function mount(){

        $htm1  = '<!DOCTYPE html><html class="no-js" lang="zxx">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <link rel="stylesheet" href="http://3.111.120.100/newlms/assets/css/vendor/bootstrap.min.css">
            <link rel="stylesheet" href="http://3.111.120.100/newlms/assets/css/app.css">
            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200;500&family=Roboto:wght@300;500&display=swap" rel="stylesheet">
        </head>
        
        <body>
            <style type="text/css">
                .btn {
                    background-color: whitesmoke;
                    border: 1.5px solid black;
                    border-radius: 10px;
                    padding: 5px;
                    text-align: start;
                }
        
                .span {
                    color: black;
                    font-size: 1.4rem;
                }
            </style>
            <div class="m-4">
                <div class="">';

        $html1 =  '</div>
                <div class="d-grid gap-2 mt-4">
                    <div class="btn" onclick="myFunction(this)" id="1" value="selOpt1">
                        <div class="row align-items-center">
                            <span class="col-auto span">A.</span>
                            <div type="text" class="col">';
        $html2  = '</div>
                            </div>
                        </div>
                        <div class="btn" onclick="myFunction(this)" id="2" value="selOpt2">
                            <div class="row align-items-center">
                                <span class="col-auto span">B.</span>
                                <div type="text" class="col">';
        $html3 = ' </div>
                                </div>
                            </div>
                            <div class="btn" onclick="myFunction(this)" id="3" value="selOpt3">
                                <div class="row align-items-center">
                                    <span class="col-auto span">C.</span>
                                    <div type="text" class="col">';
        $html4 = '</div>
                                    </div>
                                </div>
                                <div class="btn" onclick="myFunction(this)" id="4">
                                    <div class="row align-items-center">
                                        <span class="col-auto span">D.</span>
                                        <div type="text" class="col">';
        $html5 =  '</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script>
                                function myFunction(elem) {
                                    for (let i = 0; i < 5; i++) {
                                        if (elem.id == i) {
                    
                                            $("#" + i).css("border", "1.5px solid #90ee02");
                                            JSInterface.select("selOpt" + elem.id);
                                        } else {
                                            
                                            $("#" + i).css("border", "1.5px solid");
                                        }
                                    }
                                }
                            </script>
                        </body>
                        
                        </html>';

        $data = AttempedExam::with(['examination.examQ.question.mockAttemp' => function ($q) use ($testId, $user_id) {
            $q->where('attemped_exams_id', $testId->id)->where('users_id', $user_id->id);
        }])->where('slugid', $request->testId)->where('users_id', $user_id->id)->where('examinations_id', $examination_id->id)
            ->get()
            ->map(function ($d) use ($htm1, $html1, $html2, $html3, $html4, $html5) {

                if ($d['type'] != "resume") {
                    return "Test not resume";
                } else if ($d['type'] = "resume") {

                    return [
                        "testID" => $d->slugid,
                        "languageId" => $d->language->id,
                        "languageName" => $d->language->languagename,
                        "examId" => $d->examination->slugid,
                        "lastQues" => $d->lastQues,
                        "type" => $d->mocktesttype,
                        "time" => $d->remain_time,
                        "languages" => $d->examination->lang->map(function ($langg) {
                            return ["id" => $langg->language->id, "language" => $langg->language->languagename,];
                        }),
                        "wMarks" => $d->examination->wrongmarks,
                        "rMarks" => $d->examination->rightmarks,
                        'noQues' => $d->examination->noQues,
                        "questionslist" => $d->examination->examQ->map(function ($fff) use ($htm1, $html1, $html2, $html3, $html4, $html5) {
                            return collect([
                                "questionId" => $fff->question->mockAttemp->id,
                                "s" => $fff->question->mockAttemp->QuesSeen,
                                "optSel" => $fff->question->mockAttemp->QuesSelect,
                                "time" => $fff->question->mockAttemp->time,
                                "question" => $fff->question->secondquestion

                                    ->map(function ($ques) use ($htm1, $html1, $html2, $html3, $html4, $html5) {
                                        return collect([
                                            "id" => $ques->language->id,
                                            "language" => $ques->language->languagename,
                                            "QuestioninHtml" => $htm1 . $ques->question . $html1 . $ques->option1  . $html2 . $ques->option2 . $html3 . $ques->option3 . $html4 . $ques->option4 . $html5
                                        ]);
                                    })
                            ]);
                        })
                    ];
                }
            });
        return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $data]);
    
    
    }
    public function render()
    {
        return view('livewire.user.quiz-exam-result');
    }
}
