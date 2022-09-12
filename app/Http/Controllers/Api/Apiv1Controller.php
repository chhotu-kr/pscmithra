<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Blog;
use App\Models\AttempedExam;
use App\Models\BlogCategory;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Study;
use App\Models\QuizAttemptQuestion;
use App\Models\Exam;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\Examination;
use App\Models\Category;
use App\Models\ExamQuestion;
use App\Models\Language;
use App\Models\LiveTest;
use App\Models\livetest\liveAttemp;
use App\Models\livetest\liveAttempQuestion;
use App\Models\livetest\liveExam;
use App\Models\livetest\liveQuestion;
use App\Models\mockattempquestion;
use App\Models\Question;
use App\Models\quizAttemp;

use App\Models\QuizCategory;
use App\Models\QuizChapter;
use App\Models\QuizExamination;
use App\Models\QuizSubCategory;
use App\Models\QuizTopic;
use App\Models\SecondQuestion;
use App\Models\QuizQuestion;
use App\Models\SubCategory;
use App\Models\StudymetrialCategory;
use App\Models\StudymetrialChapter;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Validator;

use function PHPSTORM_META\map;

class Apiv1Controller extends Controller
{
  public function index($contact)
  {
    $user = User::where('contact', $contact)->first();
    if (!$user) {
      return response()->json(['msg' => 'Account not exist', 'status' => true]);
    }
    return response()->json(['msg' => 'Account allready exist', 'status' => false]);
  }

  //user signup api

  public function api_signup(Request $request)
  {


    if (empty($request->contact)) {
      return response()->json(['msg' => 'Enter Mobile Number', 'status' => false]);
    }
    if (empty($request->password)) {
      return response()->json(['msg' => 'Enter Password', 'status' => false]);
    }
    $user = User::where('contact', $request->contact)->first();
    if ($user) {
      return response()->json(['msg' => 'Account Already Exist', 'status' => false]);
    }
    $user = new User();
    $user->name = $request->name;
    $user->contact = $request->contact;
    $user->slugid = md5($request->name . time());
    $user->password = Hash::make($request->password);


    $user->save();
    $user['type'] = 'mobile';
    // $accessToken = $user->createToken('authToken')->accessToken;

    // return response([ 'user' => $user, 'access_token' => $accessToken]);
    return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $user]);
  }

  public function api_sendOTP(Request $request)
  {
    if (empty($request->contact)) {
      return response()->json(['status' => false, 'msg' => 'Enter mobile number']);
    }
    $randomNumber = random_int(1000, 9999);
    $data['otp'] = $randomNumber;
    return response()->json(['status' => true, 'msg' => 'Otp Send', 'data' => $data]);
  }

  public function api_login(Request $request)
  {

    if (empty($request->type)) {
      return response()->json(['msg' => 'Enter Login Type', 'status' => false]);
    }



    if ($request->type === "mobile") {
      if (empty($request->contact)) {
        return response()->json(['msg' => 'Enter Mobile Number', 'status' => false]);
      }
      if (empty($request->password)) {
        return response()->json(['msg' => 'Enter Password', 'status' => false]);
      }

      $user = User::where('contact', $request->contact)->first();
      if (!$user) {
        return response()->json(['msg' => 'user not found.', 'status' => false,]);
      }

      if (!Hash::check($request->password, $user->password)) {
        return response()->json(['msg' => 'Enter correct Password', 'status' => false]);
      } else {
        //auth()->login($user);
        // $token = auth()->user()->createToken('LaravelAuthApp')->accessToken;
        // return response()->json(['token' => $token], 200);
        $user['type'] = $request->type;
        return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $user]);
      }
    } else if ($request->type === "gmail") {
      if (empty($request->email)) {
        return response()->json(['msg' => 'Enter Email', 'status' => false]);
      }
      if (empty($request->password)) {
        return response()->json(['msg' => 'Enter Password', 'status' => false]);
      }
      if (empty($request->name)) {
        return response()->json(['msg' => 'Enter Name', 'status' => false]);
      }
      $user = User::where('email', $request->email)->first();
      if ($user) {
        $user['type'] = $request->type;
        return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $user]);
      } else {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->slugid = md5($request->name . time());
        $user->password = Hash::make($request->password);
        $user->save();
        $user['type'] = $request->type;
        return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $user]);
      }
    }

    // $accessToken = $user->createToken('authToken')->accessToken;

    // return response([ 'user' => $user, 'access_token' => $accessToken]);




  }


  //category

  public function mockTestCategory()
  {
    $data = Category::all();
    return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $data]);
  }


  public function subcategory($category_id)
  {
    $data = SubCategory::where('category_id', $category_id)->get();

    return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $data]);
    //  echo $data;
  }


  public function get_StudyMetrial()
  {
    $data = StudymetrialCategory::all();
    return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $data]);
  }








  public function get_StudyChapter($sm_categories_id)
  {
    $data = StudymetrialChapter::where('sm_categories_id', $sm_categories_id)->get();
    return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $data]);
  }




  // ..........studymetrial API...........

  public function get_SMetrial(Request $request)
  {
    $sm_categories_id = $request->sm_categories_id;
    if (empty($sm_categories_id)) {
      return response()->json(['msg' => 'Enter SmCategory Id', 'status' => false]);
    }
    $sm_chapters_id = $request->sm_chapters_id;
    if (empty($sm_chapters_id)) {
      return response()->json(['msg' => 'Enter SmChapter Id', 'status' => false]);
    }

    $data = Study::select('name', 'id')->where('sm_categories_id', $sm_categories_id)->where('sm_chapters_id', $sm_chapters_id)->get();
    return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $data]);
  }


  //............product Api..............



  //............product Api..............


  public function get_SMetrial_data(Request $request)
  {
    $sm_categories_id = $request->categories_id;
    if (empty($sm_categories_id)) {
      return response()->json(['msg' => 'Enter SmCategory Id', 'status' => false]);
    }
    $sm_chapters_id = $request->chapters_id;
    if (empty($sm_chapters_id)) {
      return response()->json(['msg' => 'Enter SmChapter Id', 'status' => false]);
    }

    $sm_chapters_id = $request->chapters_id;
    if (empty($sm_chapters_id)) {
      return response()->json(['msg' => 'Enter SmChapter Id', 'status' => false]);
    }
    $sm_id = $request->sm_id;
    if (empty($sm_id)) {
      if ($sm_id != 0) {
        return response()->json(['msg' => 'Enter SmChapter Id', 'status' => $request->sm_id]);
      }
    }
    if ($sm_id == 0) {
      $data = Study::select('name', 'id', 'content')->where('sm_categories_id', $sm_categories_id)->where('sm_chapters_id', $sm_chapters_id)->get();
      return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $data]);
    } else {
      $data = Study::select('name', 'id', 'content')->where('sm_categories_id', $sm_categories_id)->where('sm_chapters_id', $sm_chapters_id)->where('id', $sm_id)->get();
      return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $data]);
    }
  }


  public function getLiveExam(Request $request)
  {
    if (empty($request->user)) {
      return response()->json(['msg' => 'Enter User', 'status' => false]);
    }
    $user_id =  User::select('id')->where("slugid", $request->user)->first();
    if (!$user_id) {
      return response()->json(['msg' => 'Invalid User ID', 'status' => false]);
    }



    $ids = liveAttemp::where('users_id', $user_id->id)->where('testtype', 'normal')->where('type', 'result')->pluck('live_exams_id')->all();

    $data = liveExam::with('lang.language')->with(
      'attm',
      function ($query) use ($user_id) {
        $query->where('users_id', $user_id->id)->where('testtype', 'normal');
      }
    )->whereNotIn('id', $ids)

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


        $start = date("Y-m-d h:i:sa", $item->start);
        $ss = strtotime("now");
        $final_start = $item->start - $ss;
        $status = "start";
        if ($final_start < 0) {
          $status = "end";
        }

        $end = date("Y-m-d h:i:sa", $item->end);

        // $final_end = $end - $ss;
        // if ($final_end < 0) {
        //   $status = "end";
        // }


        return collect([
          "testId" => $TestID,
          "id" => $item->slugid,
          "final_start" => $start,
          "final_end" => $end,
          "status" => $status,
          "name" => $item->exam_name,
          "totalQues" => $item->noques,
          "marks" => $item->marks,
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
    return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $data]);
  }

  public function getResultExam(Request $request)
  {
    if (empty($request->user)) {
      return response()->json(['msg' => 'Enter User', 'status' => false]);
    }
    $user_id =  User::select('id')->where("slugid", $request->user)->first();
    if (!$user_id) {
      return response()->json(['msg' => 'Invalid User ID', 'status' => false]);
    }



    $ids = liveAttemp::where('users_id', $user_id->id)->where('testtype', 'normal')->where('type', 'result')->pluck('live_exams_id')->all();

    $data = liveExam::with('lang.language')->with(
      'attm',
      function ($query) use ($user_id) {
        $query->where('users_id', $user_id->id)->where('testtype', 'normal');
      }
    )->whereIn('id', $ids)

      ->get()
      ->map(function ($item) {
        $type = $item->attm->type;
        $TestID =  $item->attm->slugid;



        $start = $item->start;
        $ss = strtotime("now");
        $final_start = $start - $ss;
        if ($final_start < 0) {
          $final_start = 0;
        }

        $end = $item->end;

        $final_end = $end - $ss;
        if ($final_end < 0) {
          $final_end = 0;
        }


        return collect([
          "testId" => $TestID,
          "id" => $item->slugid,
          "final_start" => $final_start,
          "final_end" => $final_end,
          "name" => $item->exam_name,

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
    return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $data]);
  }





  // .............Examination...........
  public function get_Examination(Request $request)
  {
    if (empty($request->user)) {
      return response()->json(['msg' => 'Enter User', 'status' => false]);
    }
    $user_id =  User::select('id')->where("slugid", $request->user)->first();
    if (!$user_id) {
      return response()->json(['msg' => 'Invalid User ID', 'status' => false]);
    }
    $category_id = $request->category_id;
    if (empty($category_id)) {
      return response()->json(['msg' => 'Enter Category Id', 'status' => false]);
    }
    $subcategory_id = $request->subcategory_id;
    if (empty($subcategory_id)) {
      return response()->json(['msg' => 'Enter SubCategory Id', 'status' => false]);
    }

    $data = Examination::where('category_id', $category_id)->where('subcategory_id', $subcategory_id)
      ->with('category', 'subcategory', 'lang.language')->with(['attm' => function ($q) use ($user_id) {
        $q->where('users_id', $user_id->id)->where('mocktesttype', 'normal');
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
    return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $data]);
  }



  public function prepareLiveExam(Request $request)
  {
    if (empty($request->user)) {
      return response()->json(['msg' => 'Enter User', 'status' => false]);
    }
    $user_id =  User::select('id')->where("slugid", $request->user)->first();
    if (!$user_id) {
      return response()->json(['msg' => 'Invalid User ID', 'status' => false]);
    }
    if (empty($request->examination)) {
      return response()->json(['msg' => 'Enter Examination', 'status' => false]);
    }
    $examination_id =  liveExam::select('id', 'start')->where("slugid", $request->examination)->first();
    if (!$examination_id) {
      return response()->json(['msg' => 'Invalid Exam', 'status' => false]);
    }

    if (!$request->examtype) {
      return response()->json(['msg' => 'Invalid Exam Type', 'status' => false]);
    }


    $start = $examination_id->start;
    $ss = strtotime("now");
    $final_start = $start - $ss;
    if ($final_start < 0) {
      $get = liveAttemp::where('live_exams_id', $examination_id->id)->where('users_id', $user_id->id)->first();
      if (empty($get)) {
        $Attemp = new liveAttemp();
        $Attemp->slugid = md5($request->user . time());
        $Attemp->live_exams_id = $examination_id->id;
        $Attemp->users_id = $user_id->id;
        $Attemp->language_id = $request->language;
        $Attemp->save();
        $examQuestion =  liveQuestion::where('live_exams_id', $examination_id->id)->pluck('question_id');
        // $insertData = [];
        foreach ($examQuestion as $value) {

          $mock = new liveAttempQuestion();
          $mock->users_id =  $user_id->id;
          $mock->questions_id = $value;
          $mock->live_attemps_id = $Attemp->id;
          $mock->save();
        }
        return response()->json(['msg' => 'Exam Created', 'status' => true, 'data' => ['testId' => $Attemp->slugid, "examinationId" => $request->examination]]);
      } else {
        return response()->json(['msg' => 'Exam already exist', 'status' => false]);
      }
    } else {
      return response()->json(['msg' => 'Exam not Start', 'status' => false]);
    }
    //   mockattempquestion::insert($insertData);


  }

  public function preareExam(Request $request)
  {
    if (empty($request->user)) {
      return response()->json(['msg' => 'Enter User', 'status' => false]);
    }
    $user_id =  User::select('id')->where("slugid", $request->user)->first();
    if (!$user_id) {
      return response()->json(['msg' => 'Invalid User ID', 'status' => false]);
    }
    if (empty($request->examination)) {
      return response()->json(['msg' => 'Enter Examination', 'status' => false]);
    }
    $examination_id =  Examination::select('id', 'time_duration')->where("slugid", $request->examination)->first();
    if (!$examination_id) {
      return response()->json(['msg' => 'Invalid Exam', 'status' => false]);
    }

    if (!$request->examtype) {
      return response()->json(['msg' => 'Invalid Exam Type', 'status' => false]);
    }

    $get = AttempedExam::where('examinations_id', $examination_id->id)->where('mocktesttype', $request->examtype)->where('users_id', $user_id->id)->first();
    if (empty($get)) {




      $Attemp = new AttempedExam();
      $Attemp->slugid = md5($request->user . time());
      $Attemp->examinations_id = $examination_id->id;
      $Attemp->users_id = $user_id->id;
      $Attemp->language_id = $request->language;
      $Attemp->remain_time = $examination_id->time_duration * 60;
      $Attemp->mocktesttype = $request->examtype;
      $Attemp->save();

      $examQuestion =  ExamQuestion::where('examination_id', $examination_id->id)->pluck('question_id');
      // $insertData = [];
      foreach ($examQuestion as $value) {

        $mock = new mockattempquestion();
        $mock->users_id =  $user_id->id;
        $mock->questions_id = $value;
        $mock->attemped_exams_id = $Attemp->id;
        $mock->save();
      }
      return response()->json(['msg' => 'Exam Created', 'status' => true, 'data' => ['testId' => $Attemp->slugid, "examinationId" => $request->examination]]);
    } else {

      if ($request->examtype == "reattemp") {
        $get->lastQues = 0;
        $get->type = "resume";
        $get->language_id = $request->language;
        $get->remain_time = $examination_id->time_duration * 60;
        $get->save();

        $testId = $get->id;
        $data =   mockattempquestion::where('attemped_exams_id', $testId)->where('users_id', $user_id->id)->update([
          "QuesSeen" => "false",
          "QuesSelect" => "",
          "time" => 0,
        ]);


        return response()->json(['msg' => 'Exam Created', 'status' => true, 'data' => ['testId' => $get->slugid, "examinationId" => $request->examination]]);
      } else {
        return response()->json(['msg' => 'Exam already exist', 'status' => false]);
      }
    }
    //   mockattempquestion::insert($insertData);


  }

  //.......................quiz prepareExam.......................//

  public function preareQuizExam(Request $request)
  {
    if (empty($request->user)) {
      return response()->json(['msg' => 'Enter User', 'status' => false]);
    }
    $user_id =  User::select('id')->where("slugid", $request->user)->first();
    if (!$user_id) {
      return response()->json(['msg' => 'Invalid User ID', 'status' => false]);
    }
    if (empty($request->quizexamination)) {
      return response()->json(['msg' => 'Enter QuizExamination', 'status' => false]);
    }
    $quiz_examinations_id =  QuizExamination::select('id', 'time_duration')->where("slugid", $request->quizexamination)->first();

    if (!$quiz_examinations_id) {
      return response()->json(['msg' => 'Invalid Exam', 'status' => false]);
    }
    if (!$request->examtype) {
      return response()->json(['msg' => 'Invalid Exam Type', 'status' => false]);
    }


    //$Quiz = new quizAttemp();
    //$Quiz->slugid = md5($request->user . time());
    // $Quiz->quiz_examinations_id = $quiz_examinations_id->id;
    //$Quiz->users_id = $user_id->id;
    //$Quiz->language_id = $request->language;
    //$Quiz->save();

    $get = quizAttemp::where('quiz_examinations_id', $quiz_examinations_id->id)->where('testtype', $request->examtype)->where('users_id', $user_id->id)->first();


    if (empty($get)) {
      $Quiz = new quizAttemp();
      $Quiz->slugid = md5($request->user . time());
      $Quiz->quiz_examinations_id = $quiz_examinations_id->id;
      $Quiz->users_id = $user_id->id;
      $Quiz->language_id = $request->language;
      $Quiz->remain_time = $quiz_examinations_id->time_duration * 60;
      $Quiz->testtype = $request->examtype;
      $Quiz->save();
      $examQuestion =  QuizQuestion::where('quiz_examinations_id', $quiz_examinations_id->id)->pluck('question_id');

      foreach ($examQuestion as $value) {

        $mock = new QuizAttemptQuestion();
        $mock->users_id =  $user_id->id;
        $mock->question_id = $value;
        $mock->quiz_attemps_id = $Quiz->id;
        $mock->save();
      }





      return response()->json(['msg' => 'Quiz Created', 'status' => true, 'data' => ['testId' => $Quiz->slugid, "examinationId" => $request->quizexamination]]);
    } else {

      if ($request->examtype == "reattemp") {
        $get->lastQues = 0;
        $get->type = "resume";
        $get->language_id = $request->language;
        $get->remain_time = $quiz_examinations_id->time_duration * 60;
        $get->save();

        $testId = $get->id;
        $data =   QuizAttemptQuestion::where('quiz_attemps_id', $testId)->where('users_id', $user_id->id)->update([
          "QuesSeen" => "false",
          "QuesSelect" => "",
          "time" => 0,
        ]);



        return response()->json(['msg' => 'Quiz Created', 'status' => true, 'data' => ['testId' => $get->slugid, "examinationId" => $request->quizexamination]]);
      } else {
        return response()->json(['msg' => 'Quiz already exist', 'status' => false]);
      }
    }
  }
  //     if ($request->examtype == "reattemp") {
  //       


  //         return response()->json(['msg' => 'Exam Created', 'status' => true, 'data' => ['testId' => $get->slugid, "examinationId" => $request->examination]]);
  //     } else {
  //         return response()->json(['msg' => 'Exam already exist', 'status' => false]);
  //     }
  // }





  public function get_Product()
  {
    $data = Product::all();
    return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $data]);
  }


  public function getProductFilter(Request $request)
  {
    $data = Product::where('type', $request->type);
    $data = $data->get();
    if ($request->type == "plan") {

      if (!empty($data)) {
        $data = $data->map(function ($item) {
          return collect([
            "id" => $item->id,
            "subject" => $item->subject->sub_name,
            "slugid" => $item->slugid,
            "description" => $item->description,
            "type" => $item->type,
            "price" => $item->price,
            "bannerimage" => $item->bannerimage,
            "title" => $item->title,
            "plans" => $item->plans->map(function ($singlePlan) {
              $final = [];
              if ($singlePlan->type == "liveexam") {
                $final = ["title" => "LiveExam", "freetest" => $singlePlan->freemocktest, "duration" => $singlePlan->examduration];
              } else if ($singlePlan->type == "mocktest") {

                $tittle = "MockTest - " . $singlePlan->cat->category;
                if (!empty($singlePlan->subcat)) {
                  $tittle = $tittle . " - " . $singlePlan->subcat->subcategor;
                }

                $final = ["title" => $tittle, "freetest" => $singlePlan->freemocktest, "duration" => $singlePlan->examduration];
              } else if ($singlePlan->type == "studymetrial") {

                $tittle = "Study Material - " . $singlePlan->smc->name;
                if (!empty($singlePlan->smt)) {
                  $tittle = $tittle . " - " . $singlePlan->smt->name;
                }

                $final = ["title" => $tittle, "duration" => $singlePlan->examduration];
              } else if ($singlePlan->type == "quiz") {
                $tittle = "Quiz - " . $singlePlan->qcat->name;
                if (!empty($singlePlan->qsubcat)) {
                  $tittle = $tittle . " - " . $singlePlan->qsubcat->name;
                }
                if (!empty($singlePlan->qchapter)) {
                  $tittle = $tittle . " - " . $singlePlan->qchapter->name;
                }
                if (!empty($singlePlan->qtopics)) {
                  $tittle = $tittle . " - " . $singlePlan->qtopics->name;
                }



                $final = ["title" => $tittle, "freetest" => $singlePlan->freemocktest, "duration" => $singlePlan->examduration];
              }

              return $final;
            }),
          ]);
        });
      }
    } else if ($request->type == "book") {
      $data = $data->map(function ($item) {
        return collect([
          "id" => $item->id,
          "subject" => $item->subject->sub_name,
          "slugid" => $item->slugid,
          "description" => $item->description,
          "type" => $item->type,
          "price" => $item->price,
          "bannerimage" => $item->bannerimage,
          "title" => $item->title,
          "Author" => $item->book->book->authors->name,
          "Author" => $item->book->book->name,
        ]);
      });
    }





    return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $data]);
  }

  public function Add_To_Cart()
  {
    $data = Cart::all();

    return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $data]);
  }

  public function DeleteCart(Cart $cart)
  {
    $cart->delete();

    return response()->json(['msg' => 'Data deleted', 'status' => true, 'data' => $cart]);
  }

  public function get_Verification($code)
  {
    $coupon = Coupon::where('code', $code)->first();
    if (!$coupon) {

      return response()->json(['msg' => 'Coupon not exist', 'status' => true]);
    } else {
      return response()->json(['msg' => 'Coupon allready used', 'status' => false]);
    }
  }

  ///////////////////////////Quiz////////////////////////////////////////////////////

  public function quizCategory(Request $request)
  {

    $data = QuizCategory::withCount('subcategory')->get();
    return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $data]);
  }
  public function quizSubCategory(Request $request)
  {


    if (empty($request->category)) {
      return response()->json(['msg' => 'Enter Cateogry', 'status' => false]);
    }
    $data = QuizSubCategory::where('quiz_categories', $request->category)->withCount('chapter')->get();



    return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $data]);
  }
  public function quizChapter(Request $request)
  {

    if (empty($request->subCategory)) {
      return response()->json(['msg' => 'Enter SubCateogry', 'status' => false]);
    }
    $data = QuizChapter::where('quiz_sub_categories', $request->subCategory)->withCount('topic')->get();
    return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $data]);
  }
  public function quizTopic(Request $request)
  {
    if (empty($request->chapter)) {
      return response()->json(['msg' => 'Enter Chapter', 'status' => false]);
    }

    $data = QuizTopic::where('quiz_chapters', $request->chapter)->get();
    return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $data]);
  }


  public function get_QuizExamination(Request $request)
  {
    if (empty($request->user)) {
      return response()->json(['msg' => 'Enter User', 'status' => false]);
    }
    $user_id =  User::select('id')->where("slugid", $request->user)->first();
    if (!$user_id) {
      return response()->json(['msg' => 'Invalid User ID', 'status' => false]);
    }
    $quiz_categories_id = $request->quiz_categories_id;
    if (empty($quiz_categories_id)) {
      return response()->json(['msg' => 'Enter QuizCategory Id', 'status' => false]);
    }
    $quiz_sub_categories_id = $request->quiz_sub_categories_id;

    $quiz_chapters_id = $request->quiz_chapters_id;

    $quiz_topics_id = $request->quiz_topics_id;


    $data = QuizExamination::where('quiz_categories_id', $quiz_categories_id)->where('quiz_sub_categories_id', $quiz_sub_categories_id)
      ->where('quiz_chapters_id', $quiz_chapters_id)->where('quiz_topics_id', $quiz_topics_id)
      ->with('quizCat', 'quizsubcat', 'quizChat', 'quiztopic', 'lang.language')->with(['quizattm' => function ($qc) use ($user_id) {
        $qc->where('users_id', $user_id->id);
      }])


      ->get()
      ->map(function ($item) {
        //    return $item;

        $free = $item->isFree;
        $type = "Buy";
        $TestID = "";

        if (empty($item->quizattm)) {

          if ($free) {
            $type = "Start";
          } else {
          }
        } else {
          $type = $item->quizattm->type;
          $TestID =  $item->quizattm->slugid;
        }



        return collect([
          "testId" => $TestID,
          "id" => $item->slugid,

          "name" => $item->exam_name,
          "totalTimeinMints" => $item->time_duration,
          "totalQues" => $item->noquizques,
          "type" => $type,
          "totalTimeinMints" => $item->time_duration,
          "languages" => $item->lang->map(function ($lang) {
            return collect([

              "name" => $lang->language->languagename,
              "id" => $lang->language->id,

            ]);
          })
        ]);
      });
    return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $data]);
  }


  public function __checkUser(Request $request)
  {
    if (empty($request->user)) {
      return ['msg' => 'Enter User', 'status' => false];
    }
    $user_id =  User::select('id')->where("slugid", $request->user)->first();
    if (!$user_id) {
      return ['msg' => 'Invalid User ID', 'status' => false];
    } else {
      return;
    }
  }

  public function getBlogCategory()
  {

    $data = BlogCategory::all();

    return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $data]);
  }

  public function getBlog(Request $request)
  {


    $data = Blog::where('category_id', $request->category_id)->get();

    return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $data]);
  }



  public function  getLiveData(Request $request)
  {
    if (empty($request->user)) {
      return response()->json(['msg' => 'Enter User', 'status' => false]);
    }
    $user_id =  User::select('id')->where("slugid", $request->user)->first();
    if (!$user_id) {
      return response()->json(['msg' => 'Invalid User ID', 'status' => false]);
    }
    if (empty($request->examination)) {
      return response()->json(['msg' => 'Enter Examination', 'status' => false]);
    }
    $examination_id =  liveExam::select('id')->where("slugid", $request->examination)->first();

    if (!$examination_id) {
      return response()->json(['msg' => 'Invalid Exam', 'status' => false]);
    }

    if (empty($request->testId)) {
      return response()->json(['msg' => 'Enter Test Id', 'status' => false]);
    }
    $testId =  liveAttemp::select('id')->where("slugid", $request->testId)->first();

    if (!$testId) {
      return response()->json(['msg' => 'Invalid Test Id', 'status' => false]);
    }




    $data = liveAttemp::with(['examination.examQ.question.liveAttemp' => function ($q) use ($testId, $user_id) {
      $q->where('live_attemps_id', $testId->id)->where('users_id', $user_id->id);
    }])->where('slugid', $request->testId)->where('users_id', $user_id->id)->where('live_exams_id', $examination_id->id)
      ->get()
      ->map(function ($d) {

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
            "questionslist" => $d->examination->examQ->map(function ($fff) {




              return collect([
                "questionId" => $fff->question->liveAttemp->id,
                "s" => $fff->question->liveAttemp->QuesSeen,
                "optSel" => $fff->question->liveAttemp->QuesSelect,
                "time" => $fff->question->liveAttemp->time,
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
                    ]);
                  })
              ]);
            })
          ];
        }
      });
    return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $data]);
  }


  public function getLiveSolution(Request $request)
  {
    if (empty($request->user)) {
      return response()->json(['msg' => 'Enter User', 'status' => false]);
    }
    $user_id =  User::select('id')->where("slugid", $request->user)->first();
    if (!$user_id) {
      return response()->json(['msg' => 'Invalid User ID', 'status' => false]);
    }
    if (empty($request->examination)) {
      return response()->json(['msg' => 'Enter Examination', 'status' => false]);
    }
    $examination_id =  liveExam::select('id')->where("slugid", $request->examination)->first();

    if (!$examination_id) {
      return response()->json(['msg' => 'Invalid Exam', 'status' => false]);
    }

    if (empty($request->testId)) {
      return response()->json(['msg' => 'Enter Test Id', 'status' => false]);
    }
    $testId =  liveAttemp::select('id')->where("slugid", $request->testId)->first();

    if (!$testId) {
      return response()->json(['msg' => 'Invalid Test Id', 'status' => false]);
    }





    $data = liveAttemp::with(['examination.examQ.question.liveAttemp' => function ($q) use ($testId, $user_id) {
      $q->where('live_attemps_id', $testId->id)->where('users_id', $user_id->id);
    }])->where('slugid', $request->testId)->where('users_id', $user_id->id)->where('live_exams_id', $examination_id->id)
      ->get()
      ->map(function ($d) {

        if ($d['type'] == "resume") {
          return "Test not Complete";
        } else if ($d['type'] == "result") {

          return [
            "testID" => $d->slugid,
            "languageId" => $d->language->id,
            "languageName" => $d->language->languagename,
            "examId" => $d->examination->slugid,
            "lastQues" => $d->lastQues,
            "time" => $d->remain_time,
            "languages" => $d->examination->lang->map(function ($langg) {
              return ["id" => $langg->language->id, "language" => $langg->language->languagename,];
            }),
            "wMarks" => $d->examination->wrongmarks,
            "rMarks" => $d->examination->rightmarks,
            'noQues' => $d->examination->noQues,
            "questionslist" => $d->examination->examQ->map(function ($fff) {
              $aaa = false;
              if ($fff->question->rightans == $fff->question->liveAttemp->QuesSelect) {
                $aaa = true;
              } else {
                $aaa = false;
              }
              return collect([
                "questionId" => $fff->question->liveAttemp->id,
                "seen" => $fff->question->liveAttemp->QuesSeen,
                "optSel" => $fff->question->liveAttemp->QuesSelect,
                "time" => $fff->question->liveAttemp->time,
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
          ];
        }
      });
    return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $data]);
  }


  public function getExamData(Request $request)
  {
    if (empty($request->user)) {
      return response()->json(['msg' => 'Enter User', 'status' => false]);
    }
    $user_id =  User::select('id')->where("slugid", $request->user)->first();
    if (!$user_id) {
      return response()->json(['msg' => 'Invalid User ID', 'status' => false]);
    }
    if (empty($request->examination)) {
      return response()->json(['msg' => 'Enter Examination', 'status' => false]);
    }
    $examination_id =  Examination::select('id')->where("slugid", $request->examination)->first();

    if (!$examination_id) {
      return response()->json(['msg' => 'Invalid Exam', 'status' => false]);
    }

    if (empty($request->testId)) {
      return response()->json(['msg' => 'Enter Test Id', 'status' => false]);
    }
    $testId =  AttempedExam::select('id')->where("slugid", $request->testId)->first();

    if (!$testId) {
      return response()->json(['msg' => 'Invalid Test Id', 'status' => false, "asdasd" => $testId]);
    }

    $data = AttempedExam::with(['examination.examQ.question.mockAttemp' => function ($q) use ($testId, $user_id) {
      $q->where('attemped_exams_id', $testId->id)->where('users_id', $user_id->id);
    }])->where('slugid', $request->testId)->where('users_id', $user_id->id)->where('examinations_id', $examination_id->id)
      ->get()
      ->map(function ($d) {

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
            "questionslist" => $d->examination->examQ->map(function ($fff) {




              return collect([
                "questionId" => $fff->question->mockAttemp->id,
                "s" => $fff->question->mockAttemp->QuesSeen,
                "optSel" => $fff->question->mockAttemp->QuesSelect,
                "time" => $fff->question->mockAttemp->time,
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
                    ]);
                  })
              ]);
            })
          ];
        }
      });
    return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $data]);
  }

  public function get_QuizExamData(Request $request)
  {
    if (empty($request->user)) {
      return response()->json(['msg' => 'Enter User', 'status' => false]);
    }
    $user_id =  User::select('id')->where("slugid", $request->user)->first();
    if (!$user_id) {
      return response()->json(['msg' => 'Invalid User ID', 'status' => false]);
    }
    if (empty($request->quizexamination)) {
      return response()->json(['msg' => 'Enter QuizExamination', 'status' => false]);
    }
    $quiz_examinations_id =  QuizExamination::select('id')->where("slugid", $request->quizexamination)->first();

    if (!$quiz_examinations_id) {
      return response()->json(['msg' => 'Invalid Exam', 'status' => false]);
    }

    if (empty($request->testId)) {
      return response()->json(['msg' => 'Enter Test Id', 'status' => false]);
    }
    $testId =  quizAttemp::select('id')->where("slugid", $request->testId)->first();

    if (!$testId) {
      return response()->json(['msg' => 'Invalid Test Id', 'status' => false]);
    }



    $data = quizAttemp::with(['examination.quizexamQ.question.quizAttemp' => function ($q) use ($testId, $user_id) {
      $q->where('quiz_attemps_id', $testId->id)->where('users_id', $user_id->id);
    }])->where('slugid', $request->testId)->where('users_id', $user_id->id)->where('quiz_examinations_id', $quiz_examinations_id->id)
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
                      "option1" => $ques->option1,
                      "option2" => $ques->option2,
                      "option3" => $ques->option3,
                      "option4" => $ques->option4,
                      "direction" => $ques->direction,

                    ]);
                  })

              ]);
            })
          ]);
        }
      });
    return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $data]);
  }


  public function get_QuizSolutions(Request $request)
  {
    if (empty($request->user)) {
      return response()->json(['msg' => 'Enter User', 'status' => false]);
    }
    $user_id =  User::select('id')->where("slugid", $request->user)->first();
    if (!$user_id) {
      return response()->json(['msg' => 'Invalid User ID', 'status' => false]);
    }
    if (empty($request->quizexamination)) {
      return response()->json(['msg' => 'Enter QuizExamination', 'status' => false]);
    }
    $quiz_examinations_id =  QuizExamination::select('id')->where("slugid", $request->quizexamination)->first();

    if (!$quiz_examinations_id) {
      return response()->json(['msg' => 'Invalid Exam', 'status' => false]);
    }

    if (empty($request->testId)) {
      return response()->json(['msg' => 'Enter Test Id', 'status' => false]);
    }

    $testId = quizAttemp::select('id')->where("slugid", $request->testId)->first();


    if (!$testId) {
      return response()->json(['msg' => 'Invalid Test Id', 'status' => false]);
    }


    $data = quizAttemp::with(['examination.quizexamQ.question.quizAttemp' => function ($q) use ($testId, $user_id) {
      $q->where('quiz_attemps_id', $testId->id)->where('users_id', $user_id->id);
    }])->where('slugid', $request->testId)->where('users_id', $user_id->id)->where('quiz_examinations_id', $quiz_examinations_id->id)
      ->get()
      ->map(function ($d) {

        //  $data = quizAttemp::with(['examination.quizexamQ.question.quizAttemp' => function ($q) use ($testId, $user_id) {
        //           $q->where('quiz_attemps_id', $testId->id)->where('users_id', $user_id->id);
        //     }])->where('slugid', $request->testId)->where('users_id', $user_id->id)->where('quiz_examinations_id', $quiz_examinations_id->id)
        //       ->get()
        //    ->map(function ($d) use ($htm1, $html1, $html2, $html3, $html4, $html5) {


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
      });
    return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $data]);
  }


  public function getExamSolution(Request $request)
  {
    if (empty($request->user)) {
      return response()->json(['msg' => 'Enter User', 'status' => false]);
    }
    $user_id =  User::select('id')->where("slugid", $request->user)->first();
    if (!$user_id) {
      return response()->json(['msg' => 'Invalid User ID', 'status' => false]);
    }
    if (empty($request->examination)) {
      return response()->json(['msg' => 'Enter Examination', 'status' => false]);
    }
    $examination_id =  Examination::select('id')->where("slugid", $request->examination)->first();

    if (!$examination_id) {
      return response()->json(['msg' => 'Invalid Exam', 'status' => false]);
    }

    if (empty($request->testId)) {
      return response()->json(['msg' => 'Enter Test Id', 'status' => false]);
    }
    $testId =  AttempedExam::select('id')->where("slugid", $request->testId)->first();

    if (!$testId) {
      return response()->json(['msg' => 'Invalid Test Id', 'status' => false]);
    }

    $data = AttempedExam::with(['examination.examQ.question.mockAttemp' => function ($q) use ($testId, $user_id) {
      $q->where('attemped_exams_id', $testId->id)->where('users_id', $user_id->id);
    }])->where('slugid', $request->testId)->where('users_id', $user_id->id)->where('examinations_id', $examination_id->id)
      ->get()
      ->map(function ($d) {

        if ($d['type'] == "resume") {
          return "Test not Complete";
        } else if ($d['type'] == "result") {

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
            "questionslist" => $d->examination->examQ->map(function ($fff) {
              $aaa = false;
              if ($fff->question->rightans == $fff->question->mockAttemp->QuesSelect) {
                $aaa = true;
              } else {
                $aaa = false;
              }
              return collect([
                "questionId" => $fff->question->mockAttemp->id,
                "seen" => $fff->question->mockAttemp->QuesSeen,
                "optSel" => $fff->question->mockAttemp->QuesSelect,
                "time" => $fff->question->mockAttemp->time,
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
          ];
        }
      });
    return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $data]);
  }


  public function submitExam(Request $request)
  {

    if (empty($request->user)) {
      return response()->json(['msg' => 'Enter User', 'status' => false]);
    }

    $user =  User::select('id')->where('slugid', $request->user)->first();

    if (!$user) {
      return response()->json(['msg' => 'Invalid User ID', 'status' => false]);
    }

    if (empty($request->examination)) {
      return response()->json(['msg' => 'Enter Examination', 'status' => false]);
    }

    $examination_id =  Examination::where("slugid", $request->examination)->first();

    if (!$examination_id) {
      return response()->json(['msg' => 'Invalid Exam', 'status' => false]);
    }

    $testId = AttempedExam::where("slugid", $request->testId)->where("examinations_id", $examination_id->id)
      ->where("users_id", $user->id)->first();



    foreach ($request->array as $index => $value) {
      if ((!empty($value['optSel'])) && $value["seenType"] != "false") {

        $dd = mockattempquestion::where('questions_id', $value['questionId'])->where('users_id', $user->id)->where('attemped_exams_id', $testId->id)->update(
          [
            "QuesSeen" => $value["seenType"],
            "QuesSelect" => $value['optSel'],
            "time" => $value['time']
          ]
        );
      }



      // SELECT * FROM `questions`as u LEFT JOIN mockattempquestions as d  ON u.id = d.questions_id WHERE users_Id = 1 AND  attemped_exams_id = 5;

      // echo json_encode($value);

    }


    $type = "resume";

    if ($request->type == "submit") {
      $type = "result";
      $rMarks  = $examination_id->rightmarks;
      $wMarks = "-" . $examination_id->wrongmarks;
      $total = Question::leftjoin('mockattempquestions', function ($join) use ($rMarks, $wMarks) {
        $join->on('questions.id', '=', 'mockattempquestions.questions_id');
      })->select(
        'questions.*',
        'mockattempquestions.*',
        DB::raw('(CASE WHEN questions.rightans = mockattempquestions.QuesSelect THEN ' . $rMarks . '
               ELSE ' . $wMarks . ' END) AS total')
      )->where('users_id', $user->id)->where('attemped_exams_id', $testId->id)->get();
      $total = $total->sum('total');
      $testIds = $testId->update(
        [
          "remain_time" => $request->time,
          "lastQues" => $request->currentpostion,
          "type" => $type,
          "totalmarks" => $total,
        ]
      );

      return response()->json(['msg' => 'Test Submited', 'status' => true, 'data' =>  $testId->mocktesttype]);
    } else {
      $testId->update(
        [
          "remain_time" => $request->time,
          "lastQues" => $request->currentpostion,
        ]
      );
    }


    return response()->json(['msg' => 'Test Submited', 'status' => true, 'data' =>  $testId->type]);
  }


  public function submitLive(Request $request)
  {

    if (empty($request->user)) {
      return response()->json(['msg' => 'Enter User', 'status' => false]);
    }

    $user =  User::select('id')->where('slugid', $request->user)->first();

    if (!$user) {
      return response()->json(['msg' => 'Invalid User ID', 'status' => false]);
    }

    if (empty($request->examination)) {
      return response()->json(['msg' => 'Enter Examination', 'status' => false]);
    }

    $examination_id =  liveExam::where("slugid", $request->examination)->first();

    if (!$examination_id) {
      return response()->json(['msg' => 'Invalid Exam', 'status' => false]);
    }

    $testId = liveAttemp::where("slugid", $request->testId)->where("live_exams_id", $examination_id->id)
      ->where("users_id", $user->id)->first();


    if (sizeof($request->array) == 0) { // If more than 0
      return response()->json(['msg' => 'Array size 0', 'status' => false]);
    }



    foreach ($request->array as $index => $value) {
      if ((!empty($value['optSel'])) && $value["seenType"] != "false") {

        $dd = liveAttempQuestion::where('questions_id', $value['questionId'])->where('users_id', $user->id)->where('live_attemps_id', $testId->id)->update(
          [
            "QuesSeen" => $value["seenType"],
            "QuesSelect" => $value['optSel'],
            "time" => $value['time']
          ]
        );
      }



      // SELECT * FROM `questions`as u LEFT JOIN mockattempquestions as d  ON u.id = d.questions_id WHERE users_Id = 1 AND  attemped_exams_id = 5;

      // echo json_encode($value);

    }


    $type = "resume";
    if ($request->type == "submit") {
      $type = "result";





      $rMarks  = $examination_id->rightmarks;
      $wMarks = "-" . $examination_id->wrongmarks;

      $total = Question::leftjoin('live_attemp_questions', function ($join) use ($rMarks, $wMarks) {
        $join->on('questions.id', '=', 'live_attemp_questions.questions_id');
      })->select(
        'questions.*',
        'live_attemp_questions.*',
        DB::raw('(CASE WHEN questions.rightans = live_attemp_questions.QuesSelect THEN ' . $rMarks . '
               ELSE ' . $wMarks . ' END) AS total')
      )->where('users_id', $user->id)->where('live_attemps_id', $testId->id)->get();
      $total = $total->sum('total');
      $testIds = $testId->update(
        [
          "remain_time" => $request->time,
          "lastQues" => $request->currentpostion,
          "type" => $type,
          "totalmarks" => $total,
        ]
      );

      return response()->json(['msg' => 'Test Submited', 'status' => true, 'data' =>  $testId->testtype]);
    } else {
      $testId->update(
        [
          "remain_time" => $request->time,
          "lastQues" => $request->currentpostion,
        ]
      );
    }


    return response()->json(['msg' => 'Test Submited', 'status' => true, 'data' =>  $testId->type]);
  }

  public function submitQuiz(Request $request)
  {





    if (empty($request->user)) {
      return response()->json(['msg' => 'Enter User', 'status' => false]);
    }

    $user =  User::select('id')->where('slugid', $request->user)->first();

    if (!$user) {
      return response()->json(['msg' => 'Invalid User ID', 'status' => false]);
    }

    if (empty($request->examination)) {
      return response()->json(['msg' => 'Enter Examination', 'status' => false]);
    }

    $examination_id =  QuizExamination::where("slugid", $request->examination)->first();

    if (!$examination_id) {
      return response()->json(['msg' => 'Invalid Quiz', 'status' => false]);
    }

    $type = "resume";


    $testId = quizAttemp::where("slugid", $request->testId)->where("quiz_examinations_id", $examination_id->id)->where("users_id", $user->id)->first();

    foreach ($request->array as $index => $value) {
      if ((!empty($value['optSel'])) && $value["seenType"] != "false") {

        $dd = QuizAttemptQuestion::where('question_id', $value['questionId'])->where('users_id', $user->id)->where('quiz_attemps_id', $testId->id)->update(
          [
            "QuesSeen" => $value["seenType"],
            "QuesSelect" => $value['optSel'],
            "time" => $value['time']
          ]
        );
      }
    }

    if ($request->type == "submit") {
      $type = "result";



      $rMarks  = $examination_id->rightmarks;
      $wMarks = "-" . $examination_id->wrongmarks;



      $total = Question::leftjoin('quiz_attempt_questions', function ($join) use ($rMarks, $wMarks) {
        $join->on('questions.id', '=', 'quiz_attempt_questions.question_id');
      })->select(
        'questions.*',
        'quiz_attempt_questions.*',
        DB::raw('(CASE WHEN questions.rightans = quiz_attempt_questions.QuesSelect THEN ' . $rMarks . ' ELSE ' . $wMarks . ' END) AS total')
      )->where('users_id', $user->id)->where('quiz_attemps_id', $testId->id)->get();
      $total = $total->sum('total');
      $testIds = $testId->update(
        [
          "remain_time" => $request->time,
          "lastQues" => $request->currentpostion,
          "type" => $type,
          "totalmarks" => $total,
        ]
      );

      return response()->json(['msg' => 'Test Submited', 'status' => true, 'data' => $testId->testtype]);
    } else {
      $testId->update(
        [
          "remain_time" => $request->time,
          "lastQues" => $request->currentpostion,
        ]
      );
    }





    // SELECT * FROM `questions`as u LEFT JOIN mockattempquestions as d  ON u.id = d.questions_id WHERE users_Id = 1 AND  attemped_exams_id = 5;

    // echo json_encode($value);


    return response()->json(['msg' => 'Test Submited', 'status' => true, 'data' => $testId->type]);
    // }
    // return response()->json(['msg' => 'Test Submited', 'status' => false]);

  }


  public function resultLive(Request $request) //live
  {
    if (empty($request->userId)) {
      return response()->json(['msg' => 'Enter User', 'status' => false]);
    }
    $user_id =  User::select('id')->where("slugid", $request->userId)->first();
    if (!$user_id) {
      return response()->json(['msg' => 'Invalid User ID', 'status' => false]);
    }
    if (empty($request->examinationId)) {
      return response()->json(['msg' => 'Enter Examination', 'status' => false]);
    }
    $examination_id =  liveExam::select('id')->where("slugid", $request->examinationId)->first();

    if (!$examination_id) {
      return response()->json(['msg' => 'Invalid Exam', 'status' => false]);
    }

    if (empty($request->testId)) {
      return response()->json(['msg' => 'Enter Test Id', 'status' => false]);
    }
    $testId =  liveAttemp::select('id', 'type')->where("slugid", $request->testId)->first();

    if (!$testId) {
      return response()->json(['msg' => 'Invalid Test Id', 'status' => false]);
    }

    if ($testId->type == "resume") {

      return response()->json(['msg' => 'Test not Complete', 'status' => false]);
    }


    $data = liveAttemp::with(
      ['examination' => function ($q) use ($testId, $user_id) {

        $q->with(['examQ' => function ($q) use ($testId, $user_id) {

          $q->with(['question.liveAttemp' => function ($q) use ($testId, $user_id) {
            $q->where('live_attemps_id', $testId->id)->where('users_id', $user_id->id)->orderBy('questions_id', 'DESC');
          }]);
        }]);
      }]
    )
      ->where('slugid', $request->testId)->where('users_id', $user_id->id)->where('live_exams_id', $examination_id->id)
      ->get()
      ->map(
        function ($d) {

          $per = ($d->totalmarks / $d->examination->marks) * 100;
          return [
            "score" => $d->totalmarks,
            "percentage" => $per,
            "testID" => $d->slugid,
            "examId" => $d->examination->slugid,
            "time" => $d->examination->time_duration * 60,
            "timeTaken" => ($d->examination->time_duration * 60) - $d->remain_time,
            "languages" => $d->examination->lang->map(function ($langg) {
              return [
                "id" => $langg->language->id,
                "language" => $langg->language->languagename,
              ];
            }),
            "wMarks" => $d->examination->wrongmarks,
            "rMarks" => $d->examination->rightmarks,
            'noQues' => $d->examination->noQues,
            "questionslist" => $d->examination->examQ->map(function ($fff, $key) {

              $resaaa = "skip";
              if ($fff->question->liveAttemp->QuesSeen == "true") {
                if (empty($fff->question->liveAttemp->QuesSelect)) {
                  $color = "#797980";
                  $resaaa = "skip";
                } else if ($fff->question->rightans != $fff->question->liveAttemp->QuesSelect) {
                  $color = "#FF0000";
                  $resaaa = "wrong";
                } else if ($fff->question->rightans = $fff->question->liveAttemp->QuesSelect) {
                  $color = "#008000";
                  $resaaa = "right";
                }
              } else {
                $color = "#3e3a3a";
                $resaaa = "unseen";
              }


              return collect([
                "questionId" => $key + 1,
                "color" => $color,
                "final" => $resaaa,

              ]);
            }),

          ];
        }
      )[0];


    $right = count($data['questionslist']->where('final', 'right'));
    $wrong = count($data['questionslist']->where('final', 'wrong'));
    $attemped = $right + $wrong;

    $data['unseen'] = count($data['questionslist']->where('final', 'unseen'));
    $data['right'] = $right;
    $data['wrong'] = $wrong;
    $data['skip'] = count($data['questionslist']->where('final', 'skip'));
    $data['attemped'] = $attemped;
    if ($attemped > 0) {
      $data['accuracy'] = $right / $attemped;
    } else {
      $data['accuracy'] = 0;
    }

    $data['Percentile'] = 0;
    $data['Rank'] = 50;


    return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $data]);
  }



  public function getexamResult(Request $request)
  {
    if (empty($request->userId)) {
      return response()->json(['msg' => 'Enter User', 'status' => false]);
    }
    $user_id =  User::select('id')->where("slugid", $request->userId)->first();
    if (!$user_id) {
      return response()->json(['msg' => 'Invalid User ID', 'status' => false]);
    }
    if (empty($request->examinationId)) {
      return response()->json(['msg' => 'Enter Examination', 'status' => false]);
    }
    $examination_id =  Examination::select('id')->where("slugid", $request->examinationId)->first();

    if (!$examination_id) {
      return response()->json(['msg' => 'Invalid Exam', 'status' => false]);
    }

    if (empty($request->testId)) {
      return response()->json(['msg' => 'Enter Test Id', 'status' => false]);
    }
    $testId =  AttempedExam::select('id', 'type')->where("slugid", $request->testId)->first();

    if (!$testId) {
      return response()->json(['msg' => 'Invalid Test Id', 'status' => false]);
    }

    if ($testId->type == "resume") {

      return response()->json(['msg' => 'Test not Complete', 'status' => false]);
    }


    $data = AttempedExam::with(
      ['examination' => function ($q) use ($testId, $user_id) {

        $q->with(['examQ' => function ($q) use ($testId, $user_id) {

          $q->with(['question.mockAttemp' => function ($q) use ($testId, $user_id) {
            $q->where('attemped_exams_id', $testId->id)->where('users_id', $user_id->id)->orderBy('questions_id', 'DESC');
          }]);
        }])->with(['attm' => function ($aa) {
          $aa->where('mocktesttype', 'reattemp');
        }]);
      }]
    )
      ->where('slugid', $request->testId)->where('users_id', $user_id->id)->where('examinations_id', $examination_id->id)
      ->get()
      ->map(
        function ($d) {

          $reattempId = "";
          $reattempResult = false;

          if (!empty($d->examination->attm)) {
            $reattempId = $d->examination->attm->slugid;
            if ($d->examination->attm->type == "result") {
              $reattempResult = true;
            }
          }

          $per = ($d->totalmarks / $d->examination->marks) * 100;
          return [
            "score" => $d->totalmarks,
            "percentage" => $per,
            "testID" => $d->slugid,
            "examId" => $d->examination->slugid,
            "type" => $d->mocktesttype,
            "time" => $d->examination->time_duration * 60,
            "timeTaken" => ($d->examination->time_duration * 60) - $d->remain_time,
            "languages" => $d->examination->lang->map(function ($langg) {
              return [
                "id" => $langg->language->id,
                "language" => $langg->language->languagename,
              ];
            }),
            "wMarks" => $d->examination->wrongmarks,
            "rMarks" => $d->examination->rightmarks,
            'noQues' => $d->examination->noQues,
            "reAttempId" => $reattempId,
            "reAttempResult" => $reattempResult,

            "questionslist" => $d->examination->examQ->map(function ($fff, $key) {

              $resaaa = "skip";
              if ($fff->question->mockAttemp->QuesSeen == "true") {
                if (empty($fff->question->mockAttemp->QuesSelect)) {
                  $color = "#797980";
                  $resaaa = "skip";
                } else if ($fff->question->rightans != $fff->question->mockAttemp->QuesSelect) {
                  $color = "#FF0000";
                  $resaaa = "wrong";
                } else if ($fff->question->rightans = $fff->question->mockAttemp->QuesSelect) {
                  $color = "#008000";
                  $resaaa = "right";
                }
              } else {
                $color = "#3e3a3a";
                $resaaa = "unseen";
              }


              return collect([
                "questionId" => $key + 1,
                "color" => $color,
                "final" => $resaaa,

              ]);
            }),

          ];
        }
      )[0];


    $right = count($data['questionslist']->where('final', 'right'));
    $wrong = count($data['questionslist']->where('final', 'wrong'));
    $attemped = $right + $wrong;

    $data['unseen'] = count($data['questionslist']->where('final', 'unseen'));
    $data['right'] = $right;
    $data['wrong'] = $wrong;
    $data['skip'] = count($data['questionslist']->where('final', 'skip'));
    $data['attemped'] = $attemped;

    if ($attemped > 0) {
      $data['accuracy'] = $right / $attemped;
    } else {
      $data['accuracy'] = 0;
    }

    $data['Percentile'] = 0;
    $data['Rank'] = 50;


    return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $data]);
  }






  public function get_Result(Request $request)
  {

    if (empty($request->userId)) {
      return response()->json(['msg' => 'Enter User', 'status' => false]);
    }
    $user_id =  User::select('id')->where("slugid", $request->userId)->first();
    if (!$user_id) {
      return response()->json(['msg' => 'Invalid User ID', 'status' => false]);
    }
    if (empty($request->quizexaminationid)) {
      return response()->json(['msg' => 'Enter Examination', 'status' => false]);
    }
    $examination_id =  QuizExamination::select('id')->where("slugid", $request->quizexaminationid)->first();

    if (!$examination_id) {
      return response()->json(['msg' => 'Invalid Exam', 'status' => false]);
    }

    if (empty($request->testId)) {
      return response()->json(['msg' => 'Enter Test Id', 'status' => false]);
    }
    $testId =  quizAttemp::select('id', 'type')->where("slugid", $request->testId)->first();

    if (!$testId) {
      return response()->json(['msg' => 'Invalid Test Id', 'status' => false]);
    }


    if ($testId->type == "resume") {

      return response()->json(['msg' => 'Test not Complete', 'status' => false]);
    }


    $data = quizAttemp::with(

      ['examination' => function ($q) use ($testId, $user_id) {

        $q->with(['quizexamQ' => function ($q) use ($testId, $user_id) {

          $q->with(['question.quizAttemp' => function ($q) use ($testId, $user_id) {
            $q->where('quiz_attemps_id', $testId->id)->where('users_id', $user_id->id)->orderBy('question_id', 'DESC');
          }]);
        }])->with(['quizattm' => function ($aa) {
          $aa->where('testtype', 'reattemp');
        }]);
      }]
    )
      ->where('slugid', $request->testId)->where('users_id', $user_id->id)->where('quiz_examinations_id', $examination_id->id)
      ->get()
      ->map(
        function ($d) {

          $reattempId = "";
          $reattempResult = false;
          if (!empty($d->examination->attm)) {
            $reattempId = $d->examination->attm->slugid;
            if ($d->examination->attm->type == "result") {
              $reattempResult = true;
            }
          }

          $per = ($d->totalmarks / $d->examination->marks) * 100;
          return [
            "score" => $d->totalmarks,
            "percentage" => $per,
            "testID" => $d->slugid,
            "examId" => $d->examination->slugid,
            "type" => $d->testtype,
            "time" => $d->examination->time_duration * 60,
            "timeTaken" => ($d->examination->time_duration * 60) - $d->remain_time,
            "languages" => $d->examination->lang->map(function ($langg) {
              return ["id" => $langg->language->id, "language" => $langg->language->languagename,];
            }),

            "reAttempId" => $reattempId,
            "reAttempResult" => $reattempResult,

            "wMarks" => $d->examination->wrongmarks,
            "rMarks" => $d->examination->rightmarks,
            'noQues' => $d->examination->noQues,


            "questionslist" => $d->examination->quizexamQ->map(function ($fff, $key) {

              $res = "skip";
              if ($fff->question->quizAttemp->QuesSeen == "true") {
                if (empty($fff->question->quizAttemp->QuesSelect)) {
                  $color = "#797980";
                  $res = "skip";
                } else if ($fff->question->rightans != $fff->question->quizAttemp->QuesSelect) {
                  $color = "#FF0000";
                  $res = "wrong";
                } else if ($fff->question->rightans = $fff->question->quizAttemp->QuesSelect) {
                  $color = "#008000";
                  $res = "right";
                }
              } else {
                $color = "#3e3a3a";
                $res = "unseen";
              }


              return collect([
                "questionId" => $key + 1,
                "color" => $color,
                "final" => $res,
              ]);
            }),

          ];
        }
      )[0];


    $right = count($data['questionslist']->where('final', 'right'));
    $wrong = count($data['questionslist']->where('final', 'wrong'));
    $attemped = $right + $wrong;

    $data['unseen'] = count($data['questionslist']->where('final', 'unseen'));
    $data['right'] = $right;
    $data['wrong'] = $wrong;
    $data['skip'] = count($data['questionslist']->where('final', 'skip'));
    $data['attemped'] = $attemped;
    if ($attemped > 0) {
      $data['accuracy'] = $right / $attemped;
    } else {
      $data['accuracy'] = 0;
    }

    $data['Percentile'] = 0;
    $data['Rank'] = 50;

    return response()->json(['msg' => 'Data Fetched', 'status' => true, 'data' => $data]);
  }


function getCourse(){
  return response()->json(['msg' => 'Data Fetched', 'status' => true]);
}


  function updateUserDetails(Request $request)
  {
    if (!empty($request->userid)) {
      $data = User::where("slugid", $request->userid)->first();
      if($request->name){
        $data->name = $request->name;
      }
      if($request->gender){
        $data->gender = $request->gender;
      }
      $data->save();
      return response()->json(['msg' => 'Data Fetched', 'status' => true,'data' => $data]);
    } else {
      return response()->json(['msg' => 'Enter User Id', 'status' => false]);
    }
  }


  function getUserDetails(Request $request)
  {
    if (!empty($request->userid)) {
      $data = User::where("slugid", $request->userid)->first();
      if (empty($data)) {
        return response()->json(['msg' => 'User Not Found', 'status' => false]);
      } else {
        return response()->json(['msg' => 'Data Fetched', 'status' => true,'data' => $data]);
      }
    } else {
      return response()->json(['msg' => 'Enter User Id', 'status' => false]);
    }
  }
}
