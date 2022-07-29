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
// .... User.......
// Route::get('/show/{id}',[Apiv1Controller::class,'get_Details'])->name('user.detail');

// .....Examination........

Route::get('/exam-cat',[Apiv1Controller::class,'get_Examination'])->name('examination.show');
Route::get('/study-metrial',[Apiv1Controller::class,'get_SMetrial'])->name('studymetrial.show');
Route::get('/study-metrial-data',[Apiv1Controller::class,'get_SMetrial_data'])->name('studymetrial.show');
Route::get('/prepare-exam',[Apiv1Controller::class,'preareExam'])->name('prepareExam');

//........product......
Route::get('/product',[Apiv1Controller::class,'get_Product'])->name('product.show');

//........cart.........
Route::get('/cart',[Apiv1Controller::class,'Add_To_Cart'])->name('cart.show');
Route::get('/removecart/{id}',[Apiv1Controller::class,'DeleteCart'])->name('cart.delete');
//........Coupon..........
Route::get('/coupon/{id}',[Apiv1Controller::class,'get_Verification'])->name('coupon.show');
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
