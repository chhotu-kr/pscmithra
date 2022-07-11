<?php

use App\Http\Controllers\ExamController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SecondQuestionController;
// use App\Http\Controllers\TestController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ExaminationController;
use App\Http\Controllers\MemberShipController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ScreenshotController;
use App\Http\Controllers\PdfController;
// use App\Http\Controllers\BookController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\{AddressController,CartController,ExamQuestionController,AuthController,PublicController,StudyController};
use Illuminate\Support\Facades\Route;

// Home Page Route 
use App\Http\Controllers\user\HomeController;
use App\Http\Controllers\user\ExamCatController;
use App\Http\Controllers\user\ExamSubCatController;
use App\Http\Controllers\user\PrdController;
use App\Http\Controllers\user\SubController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/





//get method

Route::get('/',[HomeController::class,'index']);
Route::get('/Exam',[ExamController::class,'index'])->name('manage.exam');
Route::get('/subjects',[SubjectController::class,'index'])->name('manage.subject');
Route::get('/manage/{id}',[TopicController::class,'show'])->name('manage.topic');
Route::get('/manageQuestion/{id}',[QuestionController::class,'index'])->name('manage.question');
Route::get('/manageQuiz',[QuestionController::class,'show'])->name('manage.quiz');
Route::get('/secondquestion',[SecondQuestionController::class,'index'])->name('insert.secondquestion');
Route::get('/category',[CategoryController::class,'index'])->name('insert.category');
Route::get('/subcategory/{id}',[SubCategoryController::class,'index'])->name('insert.subcategory');
Route::get('/language',[LanguageController::class,'index'])->name('insert.language');
Route::get('/examination',[ExaminationController::class,'index'])->name('manage.examination'); 
Route::get('/examquestion',[ExamQuestionController::class,'index'])->name('manage.examquestion'); 
Route::get('/check/{id}',[ExamQuestionController::class,'index'])->name('check.index');

//create method
Route::get('questioncreate',[QuestionController::class,'create'])->name('question.create');
Route::get('examinationcreate',[ExaminationController::class,'Create'])->name('examination.create');
Route::get('examquestioncreate',[ExamQuestionController::class,'Create'])->name('examquestion.create');



//delete method
Route::get('/examremove/{id}',[ExamController::class,'destroy'])->name('examremove');
Route::get('/subjectdelete/{id}',[SubjectController::class,'remove'])->name('subjectdelete');
Route::get('/topicdelete/{id}',[TopicController::class,'destroy'])->name('topicdelete');
Route::get('/removequestion/{id}',[QuestionController::class,'destroy'])->name('removequestion');
Route::get('/removesecondquestion/{id}',[SecondQuestionController::class,'destroy'])->name('removesecondquestion');
Route::get('/removecategory/{id}',[CategoryController::class,'destroy'])->name('removecategory');
Route::get('/removesubcategory/{id}',[SubCategoryController::class,'destroy'])->name('removesubcategory');
Route::get('/removelanguage/{id}',[LanguageController::class,'slugDelete'])->name('removelanguage');
Route::get('/removelanguage/{id}',[ExamQuestionController::class,'destroy'])->name('remove.examquestion');


//edit method
Route::get('/examUpdate/{id}',[ExamController::class,'edit'])->name('examedit');
Route::get('/subjectUpdate/{id}',[SubjectController::class,'edit'])->name('subjectedit');
Route::get('/topicUpdate/{id}',[TopicController::class,'edit'])->name('topicedit');
Route::get('/questionUpdate/{id}',[QuestionController::class,'edit'])->name('questionedit');
Route::get('/secondquestionUpdate/{id}',[SecondQuestionController::class,'edit'])->name('secondquestionedit');
Route::get('/categoryUpdate/{id}',[CategoryController::class,'edit'])->name('categoryedit');
Route::get('/languageUpdate/{id}',[LanguageController::class,'edit'])->name('languageedit');
Route::get('/examquestionUpdate/{id}',[ExamQuestionController::class,'edit'])->name('examquestion.edit');

//update mehtod
Route::post('/examUpdate/{id}',[ExamController::class,'update'])->name('exam.Update');
Route::post('/subjectUpdate/{id}',[SubjectController::class,'update'])->name('subject.Update');
Route::post('/topicUpdate/{id}',[TopicController::class,'update'])->name('topic.Update');
Route::post('/questionUpdate/{id}',[QuestionController::class,'update'])->name('question.Update');
Route::post('/secondquestionUpdate/{id}',[SecondQuestionController::class,'update'])->name('secondquestion.Update');
Route::post('/categoryUpdate/{id}',[CategoryController::class,'update'])->name('category.Update');
Route::post('/languageUpdate/{id}',[LanguageController::class,'update'])->name('language.Update');
Route::post('/examquestionUpdate/{id}',[ExamQuestionController::class,'update'])->name('examquestion.Update');

//post method
Route::post('/examstore',[ExamController::class,'store'])->name('examstore');
Route::post('/subjectstore',[SubjectController::class,'insertSubject'])->name('subjectstore');
Route::post('/topictstore',[TopicController::class,'insert'])->name('topictstore');
Route::post('/insertquestiontstore',[QuestionController::class,'store'])->name('insertquestion.store');
Route::post('/insertsecondquestiontstore',[SecondQuestionController::class,'store'])->name('insertsecondquestion.store');
Route::post('/examinationstore',[ExaminationController::class,'storeExamination'])->name('examination.store'); 
Route::post('/categorystore',[CategoryController::class,'store'])->name('category.store'); 
Route::post('/subcategorystore',[SubCategoryController::class,'store'])->name('subcategory.store'); 
Route::post('/languagestore',[LanguageController::class,'store'])->name('language.store'); 
Route::post('/examquestionstore',[ExamQuestionController::class,'store'])->name('examquestion.store'); 
 

// ecommerce


Route::resources([
    'membership'=>MemberShipController::class,
    'coupon'=>CouponController::class,
    'product'=>ProductController::class,
    'screenshot'=>ScreenshotController::class,
    'pdf'=>PdfController::class,
    'course'=>CourseController::class,
    'address'=>AddressController::class,
    'cart'=>CartController::class,
    // 'examquestion'=>ExamQuestionController::class,
    'study'=>StudyController::class,
    
 ]);

 // examquestion filter

 Route::get('/filter/{id}',[ExamQuestionController::class,'filter'])->name('question.filter');
//  Route::get('/show/{id}',[ExamQuestionController::class,'index'])->name('show.check');
 Route::get('/sub',[ExamQuestionController::class,'submit'])->name('submit.check');


// User Register And Login
Route::match(["get","post"],"/signup",[AuthController::class,"signup"])->name('signup');
Route::match(["get","post"],"/login",[AuthController::class,"login"])->name('user.login');
Route::get("/logout",[AuthController::class,"logout"])->name("logout");
Route::get("admin/logout",[AuthController::class,"Adminlogout"])->name("admin.logout");


//Admin Register And login
Route::match(["get","post"],"/adminsignup",[AuthController::class,"adminSignup"])->name('admin.signup');
Route::match(["get","post"],"/adminlogin",[AuthController::class,"adminLogin"])->name('admin.login');

// Admin middleware
Route::prefix('admin')->middleware('auth:admin')->group(function(){
    Route::get('/dashboard',[PublicController::class,'adminIndex'])->name('admin.dashboard');

});

// User middleware
Route::prefix('user')->middleware('auth:web')->group(function(){
    Route::get('/home',[PublicController::class,'index'])->name('user.dashboard');

});



// // HOME PAGE

Route::get('/exam-category',[ExamCatController::class,'exam'])->name('exam.category');
Route::get('/exam-filter/{id}',[ExamCatController::class,'filter'])->name('exam.filter');
Route::get('/homee',[HomeController::class,'index'])->name('home');
Route::get('/prd',[PrdController::class,'prd'])->name('product');

Route::get('/exam-sub',[SubController::class,'sub'])->name('user.subject');

// Route::get('/exam-bpcs',[HomeController::class,'exam'])->name('bpsc');
// Route::get('/exam-bba',[HomeController::class,'bba'])->name('bba');
// Route::get('/exam-bca',[HomeController::class,'bca'])->name('bca');
// Route::get('/exam-biology',[HomeController::class,'biology'])->name('biology');
// Route::get('/exam-bsc',[HomeController::class,'bsc'])->name('bsc');
// Route::get('/exam-chemistery',[HomeController::class,'chemistery'])->name('chemistery');
// Route::get('/exam-commerece',[HomeController::class,'commerce'])->name('commerce');
// Route::get('/exam-math',[HomeController::class,'math'])->name('math');
// Route::get('/exam-physics',[HomeController::class,'physics'])->name('physics');

// // About pages route
// Route::get('/about',[HomeController::class,'about'])->name('about');

// // course pages route
// Route::get('/course',[HomeController::class,'course'])->name('course');

// // Pattern pages route
// Route::get('/pattern',[HomeController::class,'pattern'])->name('pattern');

// // Pricing pages route
// Route::get('/pricing',[HomeController::class,'pricing'])->name('pricing');

// // syllabus pages route
// Route::get('/syllabus',[HomeController::class,'syllabus'])->name('syllabus');

// // contact pages route
// Route::get('/contact',[HomeController::class,'contact'])->name('contact');

