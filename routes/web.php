<?php

use App\Http\Controllers\ExamController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SecondQuestionController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ExaminationController;
use App\Http\Controllers\MemberShipController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ScreenshotController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\{AddressController,CartController,ExamQuestionController};
use Illuminate\Support\Facades\Route;

// Home Page Route 
use App\Http\Controller\user\HomeController;


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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
//get method
Route::get('/',[ExamController::class,'index'])->name('manage.exam');
Route::get('/subjects',[SubjectController::class,'index'])->name('manage.subject');
Route::get('/manage',[TopicController::class,'show'])->name('manage.topic');
Route::get('/manageQuestion',[QuestionController::class,'index'])->name('manage.question');
Route::get('/secondquestion',[SecondQuestionController::class,'index'])->name('insert.secondquestion');
Route::get('/category',[CategoryController::class,'index'])->name('insert.category');
Route::get('/subcategory',[SubCategoryController::class,'index'])->name('insert.subcategory');
Route::get('/language',[LanguageController::class,'index'])->name('insert.language');
Route::get('/examination',[ExaminationController::class,'index'])->name('manage.examination'); 

//create method
Route::get('questioncreate',[QuestionController::class,'create'])->name('question.create');
Route::get('examinationcreate',[ExaminationController::class,'Create'])->name('examination.create');

//Route::get('/subject/{subject_id}',[QuestionController::class,'filter'])->name('filter');

//Route::get('/insert',[ExamController::class,'create'])->name('insert');


//delete method
Route::get('/examremove/{id}',[ExamController::class,'destroy'])->name('examremove');
Route::get('/subjectdelete/{id}',[SubjectController::class,'remove'])->name('subjectdelete');
Route::get('/topicdelete/{id}',[TopicController::class,'destroy'])->name('topicdelete');
Route::get('/removequestion/{id}',[QuestionController::class,'destroy'])->name('removequestion');
Route::get('/removesecondquestion/{id}',[SecondQuestionController::class,'destroy'])->name('removesecondquestion');
Route::get('/removecategory/{id}',[CategoryController::class,'destroy'])->name('removecategory');
Route::get('/removesubcategory/{id}',[SubCategoryController::class,'destroy'])->name('removesubcategory');
Route::get('/removelanguage/{id}',[LanguageController::class,'slugDelete'])->name('removelanguage');


//edit method
Route::get('/examUpdate/{id}',[ExamController::class,'edit'])->name('examedit');
Route::get('/subjectUpdate/{id}',[SubjectController::class,'edit'])->name('subjectedit');
Route::get('/topicUpdate/{id}',[TopicController::class,'edit'])->name('topicedit');
Route::get('/questionUpdate/{id}',[QuestionController::class,'edit'])->name('questionedit');
Route::get('/secondquestionUpdate/{id}',[SecondQuestionController::class,'edit'])->name('secondquestionedit');
Route::get('/categoryUpdate/{id}',[CategoryController::class,'edit'])->name('categoryedit');
Route::get('/languageUpdate/{id}',[LanguageController::class,'edit'])->name('languageedit');

//update mehtod
Route::post('/examUpdate/{id}',[ExamController::class,'update'])->name('exam.Update');
Route::post('/subjectUpdate/{id}',[SubjectController::class,'update'])->name('subject.Update');
Route::post('/topicUpdate/{id}',[TopicController::class,'update'])->name('topic.Update');
Route::post('/questionUpdate/{id}',[QuestionController::class,'update'])->name('question.Update');
Route::post('/secondquestionUpdate/{id}',[SecondQuestionController::class,'update'])->name('secondquestion.Update');
Route::post('/categoryUpdate/{id}',[CategoryController::class,'update'])->name('category.Update');
Route::post('/languageUpdate/{id}',[LanguageController::class,'update'])->name('language.Update');

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
 
//ecommerce get method
// Route::get('/membership',[MemberShipController::class,'index'])->name('insert.membership');
// Route::get('/coupon',[CouponController::class,'index'])->name('insert.coupon');
// Route::get('/product',[ProductController::class,'index'])->name('insert.product');
// Route::get('/screenshot',[ScreenshotController::class,'index'])->name('insert.screenshot');
// Route::get('/pdf',[PdfController::class,'index'])->name('insert.pdf');
// //Route::get('/book',[BookController::class,'index'])->name('insert.book');
// Route::get('/course',[CourseController::class,'index'])->name('insert.course');
// Route::get('/address',[AddressController::class,'index'])->name('insert.address');

// //ecommerce edit method

// Route::get('/membershipUpdate/{id}',[MemberShipController::class,'edit'])->name('editmembersgip');
// Route::get('/productUpdate/{id}',[ProductController::class,'edit'])->name('editproduct');
// Route::get('/addressUpdate/{id}',[AddressController::class,'edit'])->name('editaddress');

// //ecoomerce update method

// Route::post('/productUpdate/{id}',[ProductController::class,'update'])->name('product.Update');
// Route::put('/addressUpdate/{id}',[AddressController::class,'update'])->name('address.Update');

// //ecommerce delete method
// Route::get('/removeproduct/{id}',[ProductController::class,'destroy'])->name('removeproduct');
// Route::get('/removeaddress/{id}',[AddressController::class,'destroy'])->name('removeaddress');

// //ecoomerce store method

// Route::post('membershipstore',[MemberShipController::class,'store'])->name('membership.store');
// Route::post('couponstore',[CouponController::class,'store'])->name('coupon.store');
// Route::post('productstore',[ProductController::class,'store'])->name('product.store');
// Route::post('screenshotstore',[ScreenshotController::class,'store'])->name('screenshot.store');
// Route::post('pdfstore',[PdfController::class,'store'])->name('pdf.store');
// Route::post('bookstore',[BookController::class,'store'])->name('book.store');
// Route::post('coursestore',[CourseController::class,'store'])->name('course.store');
// Route::post('addressstore',[AddressController::class,'store'])->name('address.store');
Route::resources([
    'membership'=>MemberShipController::class,
    'coupon'=>CouponController::class,
    'product'=>ProductController::class,
    'screenshot'=>ScreenshotController::class,
    'pdf'=>PdfController::class,
    'course'=>CourseController::class,
    'address'=>AddressController::class,
    'cart'=>CartController::class,
    'examquestion'=>ExamQuestionController::class,
]);




// HOME PAGE

Route::get('/home',[HomeController::class,'index'])->name('home');
Route::get('/exam-bpcs',[HomeController::class,'exam'])->name('bpsc');
Route::get('/exam-bba',[HomeController::class,'bba'])->name('bba');
Route::get('/exam-bca',[HomeController::class,'bca'])->name('bca');
Route::get('/exam-biology',[HomeController::class,'biology'])->name('biology');
Route::get('/exam-bsc',[HomeController::class,'bsc'])->name('bsc');
Route::get('/exam-chemistery',[HomeController::class,'chemistery'])->name('chemistery');
Route::get('/exam-commerece',[HomeController::class,'commerce'])->name('commerce');
Route::get('/exam-math',[HomeController::class,'math'])->name('math');
Route::get('/exam-physics',[HomeController::class,'physics'])->name('physics');

// About pages route
Route::get('/about',[HomeController::class,'about'])->name('about');

// course pages route
Route::get('/course',[HomeController::class,'course'])->name('course');

// Pattern pages route
Route::get('/pattern',[HomeController::class,'pattern'])->name('pattern');

// Pricing pages route
Route::get('/pricing',[HomeController::class,'pricing'])->name('pricing');

// syllabus pages route
Route::get('/syllabus',[HomeController::class,'syllabus'])->name('syllabus');

// contact pages route
Route::get('/contact',[HomeController::class,'contact'])->name('contact');