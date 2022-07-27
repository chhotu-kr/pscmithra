<?php

use App\Http\Controllers\ExamController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SecondQuestionController;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ExaminationController;
use App\Http\Controllers\MemberShipController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ScreenshotController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\FilterController;

// use App\Http\Controllers\CourseController;
use App\Http\Controllers\{AddressController,CartController,ExamQuestionController,AuthController, BlogCategoryController, BlogController, BookController, ItemPdfSubscriptionController, LiveTestController, ModuleController, PdfSubscriptionController, PermissionController, PublicController, QuizCategoryController, QuizChapterController, QuizExaminationController, QuizQuestionController, QuizSubCategoryController, QuizTopicController, RoleController, StudyController,StudymetrialCategoryController,StudymetrialChapterController};
use App\Http\Controllers\user\ExamCategoryController;
use App\Http\Controllers\CourseController;
use App\Models\QuizExamination;
use Illuminate\Support\Facades\Route;

// Home Page Route 
// use App\Http\Controllers\user\HomeController;
// use App\Http\Controllers\user\ExamCatController;
// use App\Http\Controllers\user\ExamSubCatController;
// use App\Http\Controllers\user\PrdController;
// use App\Http\Controllers\user\SubController;


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

 Route::get('/addadmin',[RoleController::class,'getAdmin'])->name('add.admin');
 Route::post('/adminrole',[RoleController::class,'store'])->name('store.role');
 Route::post('/addrole',[RoleController::class,'store_role'])->name('add.role');
Route::match(['get','post'],'/role',[RoleController::class,'getRole'])->name('manage.role');

// .........Admin.............
Route::get('/showrole',[RoleController::class,'get_Addrole'])->name('show.role');
Route::get('/adminrole',[RoleController::class,'adminRole'])->name('get.admin');
// Route::post('/admin',[RoleController::class,'StoreAdminRole'])->name('store.role');


// category homepage
Route::get('/mock-test',[ExamCategoryController::class,'getMocktest'])->name('user.mocktest');
Route::get('/quiz-test',[ExamCategoryController::class,'getQuiztest'])->name('user.quiztest');
Route::get('/live-test',[ExamCategoryController::class,'getLivetest'])->name('user.livetest');
// .............SubCategory homepage ...........
Route::get('/catmock-test',[ExamCategoryController::class,'getCat_Mocktest'])->name('user.catmocktest');
Route::get('/catquiz-test',[ExamCategoryController::class,'getCat_Quiztest'])->name('user.catquiztest');
Route::get('/catlive-test',[ExamCategoryController::class,'getCat_Livetest'])->name('user.catlivetest');

//get method

// Route::get('/',[HomeController::class,'index']);
Route::get('/Exam',[ExamController::class,'index'])->name('manage.exam');
Route::get('/subjects',[SubjectController::class,'index'])->name('manage.subject');
Route::get('/insertMetrial',[StudymetrialCategoryController::class,'index'])->name('insertmetrial.create');
Route::get('/insertchapter',[StudymetrialChapterController::class,'index'])->name('insertchapter.create');
Route::get('/manage/{id}',[TopicController::class,'show'])->name('manage.topic');
Route::get('/manageQuestion/{id}',[QuestionController::class,'index'])->name('manage.question');
//Route::get('/Question/{id}',[SecondQuestionController::class,'index'])->name('show.question');
Route::get('/manageQuiz',[QuestionController::class,'show'])->name('manage.quiz');
Route::get('/secondquestion/{id}',[SecondQuestionController::class,'create'])->name('insert.secondquestion');
Route::get('/category',[CategoryController::class,'index'])->name('insert.category');
Route::get('/subcategory/{id}',[SubCategoryController::class,'index'])->name('insert.subcategory');
Route::get('/language',[LanguageController::class,'index'])->name('insert.language');
Route::get('/examination',[ExaminationController::class,'index'])->name('manage.examination'); 

Route::get('/check/{id}',[ExamQuestionController::class,'index'])->name('check.index');


Route::get('/managequiz',[QuestionController::class,'show'])->name('manage.quiz');

//create method
Route::get('questioncreate',[QuestionController::class,'create'])->name('question.create');
Route::get('examinationcreate',[ExaminationController::class,'Create'])->name('examination.create');
Route::get('examquestioncreate/{id}',[ExamQuestionController::class,'Create'])->name('examquestion.create');
// Route::get('/secondquestion',[SecondQuestionController::class,'create'])->name('insert.secondquestion');




//delete method
Route::get('/examremove/{id}',[ExamController::class,'destroy'])->name('examremove');
Route::get('/subjectdelete/{id}',[SubjectController::class,'remove'])->name('subjectdelete');
Route::get('/studymetrialdelete/{id}',[StudymetrialCategoryController::class,'destroy'])->name('studymetrial.delete');
Route::get('/studychapterdelete/{id}',[StudymetrialChapterController::class,'destroy'])->name('studychapter.delete');
Route::get('/topicdelete/{id}',[TopicController::class,'destroy'])->name('topicdelete');
Route::get('/removequestion/{id}',[QuestionController::class,'destroy'])->name('removequestion');
Route::get('/removesecondquestion/{id}',[SecondQuestionController::class,'delete'])->name('remove.secondquestion');
Route::get('/removecategory/{id}',[CategoryController::class,'destroy'])->name('removecategory');
Route::get('/removesubcategory/{id}',[SubCategoryController::class,'destroy'])->name('removesubcategory');
Route::get('/deletelanguage/{id}',[LanguageController::class,'slugDelete'])->name('removelanguage');
Route::get('/removeexamquestion/{id}',[ExamQuestionController::class,'destroy'])->name('remove.examquestion');


//edit method
Route::get('/examUpdate/{id}',[ExamController::class,'edit'])->name('examedit');
Route::get('/subjectUpdate/{id}',[SubjectController::class,'edit'])->name('subjectedit');
Route::get('/studymetrialUpdate/{id}',[StudymetrialCategoryController::class,'edit'])->name('studymetrial.edit');
Route::get('/studychapterUpdate/{id}',[StudymetrialChapterController::class,'edit'])->name('studychapter.edit');
Route::get('/topicUpdate/{id}',[TopicController::class,'edit'])->name('topicedit');
Route::get('/questionUpdate/{id}',[QuestionController::class,'edit'])->name('questionedit');
Route::get('/secondquestionUpdate/{id}',[SecondQuestionController::class,'edit'])->name('secondquestionedit');
Route::get('/categoryUpdate/{id}',[CategoryController::class,'edit'])->name('categoryedit');
Route::get('/subcategoryUpdate/{id}',[SubCategoryController::class,'edit'])->name('subcategoryedit');
Route::get('/languageUpdate/{id}',[LanguageController::class,'edit'])->name('languageedit');
Route::get('/examquestionUpdate/{id}',[ExamQuestionController::class,'edit'])->name('examquestion.edit');
Route::get('examinationUpdate/{id}',[ExaminationController::class,'edit'])->name('examination->edit');

//update mehtod
Route::post('/examUpdate/{id}',[ExamController::class,'update'])->name('exam.Update');
Route::post('/subjectUpdate/{id}',[SubjectController::class,'update'])->name('subject.Update');
Route::post('/studymetrialUpdate/{id}',[StudymetrialCategoryController::class,'update'])->name('studymetrial.Update');
Route::post('/studychapterUpdate/{id}',[StudymetrialChapterController::class,'update'])->name('studychapter.Update');
Route::post('/topicUpdate/{id}',[TopicController::class,'update'])->name('topic.Update');
Route::post('/questionUpdate/{id}',[QuestionController::class,'update'])->name('question.Update');
Route::post('/secondquestionUpdate/{id}',[SecondQuestionController::class,'update'])->name('secondquestion.Update');
Route::post('/categoryUpdate/{id}',[CategoryController::class,'update'])->name('category.Update');
Route::post('/subcategoryUpdate/{id}',[SubCategoryController::class,'update'])->name('subcategory.Update');
Route::post('/languageUpdate/{id}',[LanguageController::class,'update'])->name('language.Update');
Route::post('/examquestionUpdate/{id}',[ExamQuestionController::class,'update'])->name('examquestion.Update');
Route::post('examinationUpdate/{id}',[ExaminationController::class,'update'])->name('examination.update');

//post method
Route::post('/examstore',[ExamController::class,'store'])->name('examstore');
Route::post('/subjectstore',[SubjectController::class,'insertSubject'])->name('subjectstore');
Route::post('/metrialstore',[StudymetrialCategoryController::class,'store'])->name('studymetrial.store');
Route::post('/chapters',[StudymetrialChapterController::class,'store'])->name('studychapter.store');
Route::post('/topictstore',[TopicController::class,'insert'])->name('topictstore');
Route::post('/insertquestiontstore',[QuestionController::class,'store'])->name('insertquestion.store');
Route::post('/insertsecondquestion',[SecondQuestionController::class,'store'])->name('insertsecondquestion.store');
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
    // 'course'=>CourseController::class,
    'address'=>AddressController::class,
    'cart'=>CartController::class,
    // 'examquestion'=>ExamQuestionController::class,
    'study'=>StudyController::class,
    
 ]);

 // ..........Book table route.........
 Route::get('/book',[BookController::class,'index'])->name('insert.book');
 Route::post('/store',[BookController::class,'BookStore'])->name('books.store');
 Route::get('/bookupdate/{id}',[BookController::class,'edit'])->name('books.edit');
 Route::post('/bookupdate/{id}',[BookController::class,'update'])->name('books.update');
 Route::get('removebook/{id}',[BookController::class,'destroy'])->name('books.delete');

 // ..........Coursetable route...............
 Route::get('/course',[CourseController::class,'index'])->name('course.index');
 Route::get('/coursecreate',[CourseController::class,'create'])->name('course.create');
 Route::post('/savecourse',[CourseController::class,'CourseStore'])->name('course.store');
 Route::get('/updateCourse/{id}',[CourseController::class,'CourseEdit'])->name('course.edit');
 Route::post('/updateCourse/{id}',[CourseController::class,'CourseUpdate'])->name('course.update');
 Route::get('/removeCourse/{id}',[CourseController::class,'CourseDelete'])->name('course.remove');

 //................Modules table route

 Route::get('/modules',[ModuleController::class,'index'])->name('manage.module');
 Route::get('/modulecreate',[ModuleController::class,'create'])->name('module.create');
 Route::post('/modulestore',[ModuleController::class,'store'])->name('module.store');
 Route::get('/modulesupdate/{id}',[ModuleController::class,'edit'])->name('module.edit');
 Route::post('/modulesupdate/{id}',[ModuleController::class,'update'])->name('update.module');
 Route::get('/modulesremove/{id}',[ModuleController::class,'delete'])->name('module.remove');

 //...........Blogcategory................
 Route::get('/blogcategory',[BlogCategoryController::class,'index'])->name('blog.category');
 Route::post('/categoryblog',[BlogCategoryController::class,'store'])->name('blogcategory.store');
 Route::get('/blogcategoryupdate/{id}',[BlogCategoryController::class,'edit'])->name('blogcategory.edit');
 Route::post('/blogcategoryupdate/{id}',[BlogCategoryController::class,'update'])->name('blogcategory.update');
 Route::get('/blogcatremove/{id}',[BlogCategoryController::class,'destroy'])->name('blogcategory.remove');

 // .............Blog..............

 Route::get('/manageblog',[BlogController::class,'index'])->name('blog.index');
 Route::get('/blog',[BlogController::class,'create'])->name('blog.create');
 Route::post('/blogstore',[BlogController::class,'store'])->name('blog.store');
 Route::get('/blogupdate/{id}',[BlogController::class,'edit'])->name('blog.edit');
 Route::post('/blogupdate/{id}',[BlogController::class,'update'])->name('blog.update');
 Route::get('/blogremove/{id}',[BlogController::class,'destroy'])->name('blog.destroy');

//..........pdfsubscription........,

Route::get('/pdf-subscription',[PdfSubscriptionController::class,'index'])->name('manage.pdfsubs');
Route::get('/pdfsubscription',[PdfSubscriptionController::class,'create'])->name('pdfsubs.create');
Route::post('/pdfsubs',[PdfSubscriptionController::class,'store'])->name('pdfsubs.store');
Route::get('/pdfsubsupdate/{id}',[PdfSubscriptionController::class,'edit'])->name('pdfsubs.edit');
Route::post('/pdfsubsupdate/{id}',[PdfSubscriptionController::class,'update'])->name('pdfsubs.update');
Route::get('/pdfsubsremove/{id}',[PdfSubscriptionController::class,'destroy'])->name('pdfsubs.destroy');
// .........itempdfsubscription.............
Route::get('/itempdf',[ItemPdfSubscriptionController::class,'index'])->name('manage.item');
Route::get('/item-Pdf',[ItemPdfSubscriptionController::class,'create'])->name('item.pdfsubs');
Route::post('/item-Pdfsave',[ItemPdfSubscriptionController::class,'store'])->name('itempdf.store');
Route::get('/item-Pdfupdate/{id}',[ItemPdfSubscriptionController::class,'edit'])->name('itempdf.edit');
Route::post('/item-Pdfupdate/{id}',[ItemPdfSubscriptionController::class,'update'])->name('itempdf.update');
Route::get('/removeitem_pdf/{id}',[ItemPdfSubscriptionController::class,'delete'])->name('itempdfsubs.destroy'); 
 // examquestion filter

 Route::get('/filter/{id}',[ExamQuestionController::class,'filter'])->name('question.filter');
 Route::match(["get","post"],'/sub',[ExamQuestionController::class,'submit'])->name('submit.check');


// User Register And Login
Route::match(["get","post"],"/",[AuthController::class,"signup"])->name('user.signup');
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
    Route::get('/index',[PublicController::class,'index'])->name('user.index');

});


// Route::get('/panel',[PermissionController::class,'index']);
// // HOME PAGE

//Route::get('/exam-category',[ExamCatController::class,'exam'])->name('exam.category');
// Route::get('/exam-filter/{id}',[ExamCatController::class,'filter'])->name('exam.filter');
// Route::get('/homee',[HomeController::class,'index'])->name('home');
// Route::get('/prd',[PrdController::class,'prd'])->name('product');

// Route::get('/exam-sub',[SubController::class,'sub'])->name('user.subject');

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

Route::get('/show',[ModuleController::class,'get_Examination'])->name('show.examination');
Route::get('/addproduct-bookshow',[ProductController::class,'get_Book'])->name('addproductbook.show');
Route::get('/Course-productshow',[ProductController::class,'get_Course'])->name('CourseProduct.show');
Route::get('/Pdf-productshow',[ProductController::class,'get_Pdf'])->name('Pdf.Product.show');
// pdf subscription

 Route::get('/ebook',[ProductController::class,'get_PdfSubscription'])->name('pdf.subscription');

 //.........QuizCategory...........
 Route::get('/quiz',[QuizCategoryController::class,'index'])->name('quiz.category');
 Route::post('/quizcat',[QuizCategoryController::class,'store'])->name('quizcat.store');
 Route::get('/quizupdate/{id}',[QuizCategoryController::class,'edit'])->name('quizcategory.edit');
 Route::post('/quizupdate/{id}',[QuizCategoryController::class,'update'])->name('quizcategory.update');
 Route::get('/quizremove/{id}',[QuizCategoryController::class,'destroy'])->name('quizcategory.remove');

 //.............quizSubCategory..............
 Route::get('/quizSub',[QuizSubCategoryController::class,'index'])->name('quiz.Subcategory');
 Route::post('/quizsubcat',[QuizSubCategoryController::class,'store'])->name('quizsubcat.store');
 Route::get('/quizsubcatupdate/{id}',[QuizSubCategoryController::class,'edit'])->name('quizSubcat.edit');
 Route::post('/quizsubcatupdate/{id}',[QuizSubCategoryController::class,'update'])->name('quizSubcat.update');
 Route::get('/quizSubremove/{id}',[QuizSubCategoryController::class,'destroy'])->name('quizsubcategory.remove');
 Route::get('/subcat/filter/{id}',[QuizSubCategoryController::class,'filter'])->name('subcat.filter');
 
 //..........quiz chapter.........
 Route::get('/quiz/chapter/{id}',[QuizChapterController::class,'index'])->name('quiz.chapter');
 Route::post('/quizchapt',[QuizChapterController::class,'store'])->name('quizchapter.store');
 Route::get('/quizchaptupdate/{id}',[QuizChapterController::class,'edit'])->name('quizchapter.edit');
 Route::post('/quizchaptupdate/{id}',[QuizChapterController::class,'update'])->name('quizchapter.update');
 Route::get('/quizchaptremove/{id}',[QuizChapterController::class,'destroy'])->name('quizchapter.remove');

 //........QuizTopic........
 Route::get('/quiz/topic/{id}',[QuizTopicController::class,'index'])->name('quiz.topic');
 Route::post('/quiztopic',[QuizTopicController::class,'store'])->name('quiztopic.store');
 Route::get('/quiztopicupdate/{id}',[QuizTopicController::class,'edit'])->name('quiztopic.edit');
 Route::post('/quiztopicupdate/{id}',[QuizTopicController::class,'update'])->name('quiztopic.update');
 Route::get('/quiztopicremove/{id}',[QuizTopicController::class,'destroy'])->name('quiztopic.remove');

 //.........QuizExamination............

 Route::get('/quizExamination',[QuizExaminationController::class,'index'])->name('quiz.examination');
 Route::get('/quizExami',[QuizExaminationController::class,'create'])->name('quizexamination.create');
 Route::post('/quizExamstore',[QuizExaminationController::class,'store'])->name('quizexamination.store');
 Route::get('/quizExamupdate/{id}',[QuizExaminationController::class,'edit'])->name('quizexamination.edit');
 Route::post('/quizExamupdate/{id}',[QuizExaminationController::class,'update'])->name('quizexamination.update');
 Route::get('/quizexaminationremove/{id}',[QuizExaminationController::class,'destroy'])->name('quizexamination.remove');

 //..........LiveTest............
 Route::get('/live/test',[LiveTestController::class,'index'])->name('live.test');
 Route::get('/live/testcreate',[LiveTestController::class,'create'])->name('livetest.create');
 Route::post('/live/teststore',[LiveTestController::class,'store'])->name('livetest.store');
 Route::get('/Live/testupdate/{id}',[LiveTestController::class,'edit'])->name('livetest.edit');
 Route::post('/Live/testupdate/{id}',[LiveTestController::class,'update'])->name('livetest.update');
 Route::get('/Livetestremove/{id}',[LiveTestController::class,'destroy'])->name('livetest.remove');

 //............QuizQuestion.........

 Route::get('/manage/quizques/{id}',[QuizQuestionController::class,'index'])->name('manage.quizquestion');
 Route::get('/quizques/create/{id}',[QuizQuestionController::class,'create'])->name('quizquestion.create');
 Route::post('/quizques/store',[QuizQuestionController::class,'store'])->name('quizquestion.store');
 Route::get('/quizques/update/{id}',[QuizQuestionController::class,'edit'])->name('quizquestion.edit');
 Route::post('/quizques/update/{id}',[QuizQuestionController::class,'update'])->name('quizquestion.update');
 Route::get('/quizques/remove/{id}',[QuizQuestionController::class,'destroy'])->name('quizquestion.destroy');
 Route::post('/quiz/question',[QuizQuestionController::class,'QuizSubmit'])->name('quizQues.submit');