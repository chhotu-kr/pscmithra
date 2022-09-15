<?php

use App\Http\Controllers\Api\Apiv1Controller;
use App\Http\Controllers\ApiExamController;
use App\Http\Controllers\ApiSubjectController;
use App\Http\Controllers\ApiCartController;
use App\Http\Controllers\ApiCategoryController;
use App\Http\Controllers\ApiCouponController;
use App\Http\Controllers\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\Subcategory;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post("login", [Apiv1Controller::class, "api_login"])->name("api.login");
Route::get("sign/{contact}", [Apiv1Controller::class, "index"])->name("api.sign");
Route::post("signup", [Apiv1Controller::class, "api_signup"])->name("api.signup");
Route::post("send-otp", [Apiv1Controller::class, "api_sendOTP"])->name("api.signup");


//category
Route::group(["prefix" => "mocktest"], function ($router) {

Route::get('/category',[Apiv1Controller::class,'mockTestCategory'])->name('api.category');
Route::get('/subcategory/{id}',[Apiv1Controller::class,'subcategory'])->name('api.subcategory');
});


// ....studymetrialcategory......

Route::get('/studycategory',[Apiv1Controller::class,'get_StudyMetrial'])->name('study.category');
Route::get('/studychapter/{id}',[Apiv1Controller::class,'get_StudyChapter'])->name('study.chapter');
Route::post('/examination',[Apiv1Controller::class,'get_Examination']);
Route::post('/getExamData',[Apiv1Controller::class,'getExamData']);



Route::post('/submitExam',[Apiv1Controller::class,'submitExam']);
Route::post('/submitQuiz',[Apiv1Controller::class,'submitQuiz']);

Route::post('/rankshow',[Apiv1Controller::class,'get_Result']);



Route::post('/liveExam',[Apiv1Controller::class,'getLiveExam']);//here
Route::post('/liveResultExam',[Apiv1Controller::class,'getResultExam']);
Route::post('/prepare-liveExam',[Apiv1Controller::class,'prepareLiveExam']);
Route::post('/getLiveData',[Apiv1Controller::class,'getLiveData']);
Route::post('/getsolution-live',[Apiv1Controller::class,'getLiveSolution']);//live solution
Route::post('/submitLive',[Apiv1Controller::class,'submitLive']);
Route::post('/getresuslt-live',[Apiv1Controller::class,'resultLive']);


Route::post('/getresuslt-live-re',[Apiv1Controller::class,'resultLive']);
Route::post('/getexam-resuslt-re',[Apiv1Controller::class,'getexamResult']);

Route::post('/getquiz-resuslt-re',[Apiv1Controller::class,'get_Result']);





Route::post('/prepare-exam',[Apiv1Controller::class,'preareExam'])->name('prepareExam');
Route::post('/getsolution-exam',[Apiv1Controller::class,'getExamSolution']);//mocktest solution

// .... User.......
// Route::get('/show/{id}',[Apiv1Controller::class,'get_Details'])->name('user.detail');

// .....Examination........

Route::post('/quizexamdata',[Apiv1Controller::class,'get_QuizExamination']);
Route::get('/exam-cat',[Apiv1Controller::class,'get_Examination'])->name('examination.show');
Route::post('/quiz-exam-cat',[Apiv1Controller::class,'get_QuizExamination']);
Route::post('/prepare-quiz',[Apiv1Controller::class,'preareQuizExam'])->name('prepareQuizExam');
Route::get('/study-metrial',[Apiv1Controller::class,'get_SMetrial'])->name('studymetrial.show');
Route::get('/study-metrial-data',[Apiv1Controller::class,'get_SMetrial_data'])->name('studymetrial.show');
//Route::post('/get-resuslt',[Apiv1Controller::class,'get_Result']);
//Route::post('/get-solution',[Apiv1Controller::class,'getSolution']);
Route::post('/getexam-resuslt',[Apiv1Controller::class,'getexamResult']);

Route::post('/getquiz-resuslt',[Apiv1Controller::class,'get_Result']);




Route::post('/getsolution-quiz',[Apiv1Controller::class,'get_QuizSolutions']);//quiz solution



Route::post('/getData-quiz',[Apiv1Controller::class,'get_QuizExamData']);




//........product......
Route::get('/product',[Apiv1Controller::class,'get_Product'])->name('product.show');
Route::get('/product/filter',[Apiv1Controller::class,'getProductFilter']);
Route::post('/getUserDetails',[Apiv1Controller::class,'getUserDetails']);
Route::post('/updateUserDetails',[Apiv1Controller::class,'updateUserDetails']);
Route::post('/getCourseDetails',[Apiv1Controller::class,'getCourse']);

//........cart.........

Route::post('/addToCart',[Apiv1Controller::class,'Add_To_Cart']);
Route::post('/getCart',[Apiv1Controller::class,'getCart']);
Route::post('/removecart',[Apiv1Controller::class,'DeleteCart']);
Route::post('/addAddress',[Apiv1Controller::class,'addAddress']);
Route::post('/getAddressList',[Apiv1Controller::class,'getAddressList']);
Route::post('/deleteAddress',[Apiv1Controller::class,'deleteAddress']);
Route::post('/startOrder',[Apiv1Controller::class,'startOrder']);
Route::post('/orderSucces',[Apiv1Controller::class,'orderSucces']);



//........Coupon..........
Route::get('/coupon/{id}',[Apiv1Controller::class,'get_Verification'])->name('coupon.show');
//............blog............
Route::get('/blogcategory',[Apiv1Controller::class,'getBlogCategory']);
Route::post('/blogList',[Apiv1Controller::class,'getBlog']);
//...........Live test.............//

Route::get('/live/test',[Apiv1Controller::class,'get_Livetest'])->name('livetest.show');
Route::post('/livetest/list',[Apiv1Controller::class,'liveExamData']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(["prefix" => "quiz"], function ($router) {
Route::post('/category',[Apiv1Controller::class,'quizCategory']);
Route::post('/subcategory',[Apiv1Controller::class,'quizSubCategory']);
Route::post('/chapter',[Apiv1Controller::class,'quizChapter']);
Route::post('/topic',[Apiv1Controller::class,'quizTopic']);
Route::post('/getQuiz',[Apiv1Controller::class,'get_Quiz']); 
});
