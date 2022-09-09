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
use App\Http\Controllers\{AddressController, CartController, ExamQuestionController, AuthController, AuthorController, BackgroundImageController, BlogCategoryController, BlogController, BookController, CourseQuizController, CourseQuizQuestionController, ItemPdfSubscriptionController, LiveTestController, ModuleController, PageProductController, PdfSubscriptionController, PermissionController, PublicController, QuizCategoryController, QuizChapterController, QuizExaminationController, QuizQuestionController, QuizSubCategoryController, QuizTopicController, RoleController, StudyController, StudymetrialCategoryController, StudymetrialChapterController};
use App\Http\Controllers\user\ExamCategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\admin\home\imageController;
use App\Http\Controllers\admin\home\PageController;
use App\Http\Controllers\user\HomeController;
use App\Http\Controllers\user\UserController;
use App\Http\Controllers\user\addToCartController;
use App\Http\Controllers\TestiMonils\TestimonilsController;
use App\Models\QuizExamination;
use Illuminate\Support\Facades\Route;



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
//.........................cart route.................................///
Route::get('/delete/topic/{id}',[TopicController::class,'deletestatus'])->name('delete.topic');

Route::get('/user/cart',[addToCartController::class,'index'])->name('usercart.index');
Route::get("/add-to-cart/{p_id}",[addToCartController::class,"addTCart"])->name("addtocart");
Route::get("/remove-from-cart/{p_id}",[addToCartController::class,"removeFromCart"])->name("removefromcart");
Route::get("/remove-item-from-cart/{p_id}",[addToCartController::class,"removeItemFromCart"])->name("removeitemfromCart");
Route::get("/coupon/remove",[addToCartController::class,"removeCoupon"])->name("removecoupon");
Route::post("/coupon/apply",[addToCartController::class,"applyCoupon"])->name("applycoupon");
Route::get("/products/{p_id}",[addToCartController::class,"viewProduct"])->name("viewproduct");
// Route::get('/cartproduct',function(){
//     echo message();
//     return view('user/cart/viewproduct');
// });
// Route::view('home', 'home')->name('home');

    Route::view('profile','category')->name('category');

//..............User Dashboard Route................//

Route::get('/user/profile',[HomeController::class,'get_profile'])->name('user.profile');
Route::get('/user/dashboard',[HomeController::class,'user_Dashboard'])->name('user.dashboard');
  Route::post('/update/user/password',[userController::class,'ChangePassword'])->name('update.password');
 Route::post('/update/user',[userController::class,'update'])->name('update.user');
//............//..............//...........User Page.............//................//...............//

Route::get("/", [HomeController::class, 'get_ViewHome'])->name('view.home');
Route::get('/mock-test/category', [HomeController::class, 'get_Category'])->name('view.category');
Route::get('/mock-test-exam', [HomeController::class, 'get_MockTest'])->name('view.mocktestexam');
Route::get('/mock-test/category/details/{id}', [HomeController::class, 'get_ViewCatDetails'])->name('view.categorydetails');
Route::get('/mock-test/start', [HomeController::class, 'get_MockTestStart'])->name('view.mockteststart');

Route::get('/view/blog', [HomeController::class, 'get_ViewBlog'])->name('view.blog');
Route::get('/view/blog/details', [HomeController::class, 'get_ViewBlogDetails'])->name('view.blogdetails');
Route::get('/view/course', [HomeController::class, 'get_ViewCourse'])->name('view.course');
Route::get('/view/course/details', [HomeController::class, 'get_ViewCourseDetails'])->name('view.coursedetails');
Route::get('/quizes/category', [HomeController::class, 'get_Quiz'])->name('view.quiz');
Route::get('/quizes/category/details/{cat_id}', [HomeController::class, 'get_ViewQuizDetail'])->name('view.quizdetails');
Route::get('/quizes/category/chapter/{sub_cat_id}', [HomeController::class, 'get_Quiz_SubCategory'])->name('view.quizchapter');
Route::get('/quizes/category/chapter/topic/{chapter_id}', [HomeController::class, 'get_TopicPage'])->name('view.quiztopicpage');
Route::get('/quizes', [HomeController::class, 'get_QuizPage'])->name('view.quizpage');
Route::get('/quizes/start', [HomeController::class, 'get_QuizPageStart'])->name('view.quizpagestart');
Route::get('/quiz/getresult', [HomeController::class, 'get_QuizResult'])->name('view.quizresult');
Route::get('/mocktest/getresult', [HomeController::class, 'get_MockTestResult'])->name('view.mocktestresult');
Route::get('/live/getresult', [HomeController::class, 'get_LiveQuizResult'])->name('view.liveresult ');
Route::get('/quiz/solution', [HomeController::class, 'get_QuizSolution'])->name('view.quizsolution');
Route::get('/mocktest/solution', [HomeController::class, 'get_MocktestSolution'])->name('view.mocktestsolution');
Route::get('/live/solution', [HomeController::class, 'get_LiveQuizSolution'])->name('view.livesolution');

Route::get('/mock-test/study/metrial', [HomeController::class, 'get_Study_Metrial'])->name('view.studymetrial');
Route::get('/login', [HomeController::class, 'get_Login'])->name('user.login');
Route::get('/register', [HomeController::class, 'get_Register'])->name('user.register');
Route::get('/mock-test/quiz/category', [HomeController::class, 'get_QuizCate'])->name('quiz.category');
Route::get('/mock-test/quiz/subcategory', [HomeController::class, 'get_QuizSubCate'])->name('quiz.subcategory');
Route::get('/mock-test/quiz/chapter', [HomeController::class, 'get_QuizChapt'])->name('quiz.chapter');
Route::get('/getexam-result', [HomeController::class, 'Quiz_Result'])->name('quiz.result');
Route::get('/live-quiz/start', [HomeController::class, 'Live_Quiz_Start'])->name('quiz.livequizstart');

//................calling Data ..........

Route::get('/view/home/{id}', [HomeController::class, 'filter'])->name('filter.cate');




//...............Edit Add Role..............//

Route::get('update/role/{id}', [RoleController::class, 'editRole'])->name('edit.role');
Route::post('update/role/{id}', [RoleController::class, 'updateRole'])->name('update.role');

// User Register And Login
Route::match(["get", "post"], "/Register", [AuthController::class, "signup"])->name('user.signup');
Route::match(["get", "post"], "/login", [AuthController::class, "login"])->name('user.login');
Route::get("/logout", [AuthController::class, "logout"])->name("logout");
Route::get("admin/logout", [AuthController::class, "Adminlogout"])->name("admin.logout");


///............//...............Admin Register And login...................//...............///


Route::match(["get", "post"], "/admin/signup", [AuthController::class, "adminSignup"])->name('admin.signup');
Route::match(["get", "post"], "/admin/login", [AuthController::class, "adminLogin"])->name('admin.login');

// Admin middleware

// Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['auth:admin']], function () {
//     \UniSharp\LaravelFilemanager\Lfm::routes();
// });

Route::prefix('xyz@123')->middleware('auth:admin')->group(function () {


    Route::get('/dashboard', [PublicController::class, 'adminIndex'])->name('admin.dashboard');
    //get method
    Route::get('/Exam', [ExamController::class, 'index'])->name('manage.exam');
    Route::get('/subjects', [SubjectController::class, 'index'])->name('manage.subject');
    Route::get('/insertMetrial', [StudymetrialCategoryController::class, 'index'])->name('insertmetrial.create');
    Route::get('/insertchapter', [StudymetrialChapterController::class, 'index'])->name('insertchapter.create');
    Route::get('/manage/{id}', [TopicController::class, 'show'])->name('manage.topic');
    Route::get('/manageQuestion/{id}', [QuestionController::class, 'index'])->name('manage.question');

    Route::get('/manageQuiz', [QuestionController::class, 'show'])->name('manage.quiz');
    Route::get('/secondquestion/{id}', [SecondQuestionController::class, 'create'])->name('insert.secondquestion');
    Route::get('/category', [CategoryController::class, 'index'])->name('insert.category');
    Route::get('/subcategory/{id}', [SubCategoryController::class, 'index'])->name('insert.subcategory');
    Route::get('/language', [LanguageController::class, 'index'])->name('insert.language');
    Route::get('/examination', [ExaminationController::class, 'index'])->name('manage.examination');

    Route::get('/check/{id}', [ExamQuestionController::class, 'index'])->name('check.index');


    Route::get('/managequiz', [QuestionController::class, 'show'])->name('manage.quiz');

    //create method
    Route::get('questioncreate', [QuestionController::class, 'create'])->name('question.create');
    Route::get('examinationcreate', [ExaminationController::class, 'Create'])->name('examination.create');
    Route::get('examquestioncreate/{id}', [ExamQuestionController::class, 'Create'])->name('examquestion.create');

    Route::post('/examstore', [ExamController::class, 'store'])->name('examstore');

    //..................................Livetest.........................//

    Route::get('/livetest', [LiveTestController::class, 'index'])->name('manage.livetest');
    Route::get('/insert/livetest', [LiveTestController::class, 'create'])->name('livetest.create');
    Route::post('/Store/livetest', [LiveTestController::class, 'store'])->name('livetest.store');
    Route::get('/Update/livetest/{id}', [LiveTestController::class, 'edit'])->name('livetest.edit');
    Route::post('/Update/livetest/{id}', [LiveTestController::class, 'update'])->name('livetest.update');
    Route::get('/remove/livetest/{id}', [LiveTestController::class, 'destroy'])->name('livetest.delete');

    //.................Post Method......................//

    Route::post('/subjectstore', [SubjectController::class, 'insertSubject'])->name('subjectstore');
    Route::post('/metrialstore', [StudymetrialCategoryController::class, 'store'])->name('studymetrial.store');
    Route::post('/chapters', [StudymetrialChapterController::class, 'store'])->name('studychapter.store');
    Route::post('/topictstore', [TopicController::class, 'insert'])->name('topictstore');
    Route::post('/insertquestiontstore', [QuestionController::class, 'store'])->name('insertquestion.store');
    Route::post('/insertsecondquestion', [SecondQuestionController::class, 'store'])->name('insertsecondquestion.store');
    Route::post('/examinationstore', [ExaminationController::class, 'storeExamination'])->name('examination.store');
    Route::post('/categorystore', [CategoryController::class, 'store'])->name('category.store');
    Route::post('/subcategorystore', [SubCategoryController::class, 'store'])->name('subcategory.store');
    Route::post('/languagestore', [LanguageController::class, 'store'])->name('language.store');
    Route::post('/examquestionstore', [ExamQuestionController::class, 'store'])->name('examquestion.store');

    //.....................Edit Method........................//

    Route::get('/examUpdate/{id}', [ExamController::class, 'edit'])->name('examedit');
    Route::get('/subjectUpdate/{id}', [SubjectController::class, 'edit'])->name('subjectedit');
    Route::get('/studymetrialUpdate/{id}', [StudymetrialCategoryController::class, 'edit'])->name('studymetrial.edit');
    Route::get('/studychapterUpdate/{id}', [StudymetrialChapterController::class, 'edit'])->name('studychapter.edit');
    Route::get('/topicUpdate/{id}', [TopicController::class, 'edit'])->name('topicedit');
    Route::get('/questionUpdate/{id}', [QuestionController::class, 'edit'])->name('questionedit');
    Route::get('/secondquestionUpdate/{id}', [SecondQuestionController::class, 'edit'])->name('secondquestionedit');
    Route::get('/categoryUpdate/{id}', [CategoryController::class, 'edit'])->name('categoryedit');
    Route::get('/subcategoryUpdate/{id}', [SubCategoryController::class, 'edit'])->name('subcategoryedit');
    Route::get('/languageUpdate/{id}', [LanguageController::class, 'edit'])->name('languageedit');
    Route::get('/exam/questionUpdate/{id}', [ExamQuestionController::class, 'edit'])->name('examquestion.edit');
    Route::get('/examination/Update/{id}', [ExaminationController::class, 'edit'])->name('examination.edit');

    //..........................Update Method.......................//

    Route::post('/examUpdate/{id}', [ExamController::class, 'update'])->name('exam.Update');
    Route::post('/subjectUpdate/{id}', [SubjectController::class, 'update'])->name('subject.Update');
    Route::post('/studymetrialUpdate/{id}', [StudymetrialCategoryController::class, 'update'])->name('studymetrial.Update');
    Route::post('/studychapterUpdate/{id}', [StudymetrialChapterController::class, 'update'])->name('studychapter.Update');
    Route::post('/topicUpdate/{id}', [TopicController::class, 'update'])->name('topic.Update');
    Route::post('/questionUpdate/{id}', [QuestionController::class, 'update'])->name('question.Update');
    Route::post('/secondquestionUpdate/{id}', [SecondQuestionController::class, 'update'])->name('secondquestion.Update');
    Route::post('/categoryUpdate/{id}', [CategoryController::class, 'update'])->name('category.Update');
    Route::post('/subcategoryUpdate/{id}', [SubCategoryController::class, 'update'])->name('subcategory.Update');
    Route::post('/languageUpdate/{id}', [LanguageController::class, 'update'])->name('language.Update');
    Route::post('/examquestionUpdate/{id}', [ExamQuestionController::class, 'update'])->name('examquestion.Update');
    Route::post('/examination/Update/{id}', [ExaminationController::class, 'update'])->name('examination.update');

    //..............................Delete Method...........................//

    Route::get('/examremove/{id}', [ExamController::class, 'destroy'])->name('examremove');
    Route::get('/examination/remove/{id}', [ExaminationController::class, 'destroy'])->name('examination.remove');
    Route::get('/subjectdelete/{id}', [SubjectController::class, 'remove'])->name('subjectdelete');
    Route::get('/studymetrialdelete/{id}', [StudymetrialCategoryController::class, 'destroy'])->name('studymetrial.delete');
    Route::get('/studychapterdelete/{id}', [StudymetrialChapterController::class, 'destroy'])->name('studychapter.delete');
    Route::get('/topicdelete/{id}', [TopicController::class, 'destroy'])->name('topicdelete');
    Route::get('/remove/question/{id}', [QuestionController::class, 'destroy'])->name('removequestion');
    Route::get('/removesecondquestion/{id}', [SecondQuestionController::class, 'delete'])->name('remove.secondquestion');
    Route::get('/removecategory/{id}', [CategoryController::class, 'destroy'])->name('removecategory');
    Route::get('/removesubcategory/{id}', [SubCategoryController::class, 'destroy'])->name('removesubcategory');
    Route::get('/deletelanguage/{id}', [LanguageController::class, 'slugDelete'])->name('removelanguage');
    Route::get('/remove/examquestion/{id}', [ExamQuestionController::class, 'destroy'])->name('remove.examquestion');
    // Route::get('/remove/livequestion/{id}', [LiveTestController::class, 'destroy'])->name('remove.livequestion');
    //...........................Resource Route..........................//

    Route::resources([
        'membership' => MemberShipController::class,
        'coupon' => CouponController::class,
        'product' => ProductController::class,
        'screenshot' => ScreenshotController::class,
        'pdf' => PdfController::class,

        'address' => AddressController::class,
        'cart' => CartController::class,

        'study' => StudyController::class,

    ]);

    // ..........Book table route...........//
    Route::get('/book', [BookController::class, 'index'])->name('insert.book');
    Route::post('/store', [BookController::class, 'BookStore'])->name('books.store');
    Route::get('/bookupdate/{id}', [BookController::class, 'edit'])->name('books.edit');
    Route::post('/bookupdate/{id}', [BookController::class, 'update'])->name('books.update');
    Route::get('removebook/{id}', [BookController::class, 'destroy'])->name('books.delete');

    // ..........Coursetable route...............//
    Route::get('/course', [CourseController::class, 'index'])->name('course.index');
    Route::get('/coursecreate', [CourseController::class, 'create'])->name('course.create');
    Route::post('/savecourse', [CourseController::class, 'CourseStore'])->name('course.store');
    Route::get('/updateCourse/{id}', [CourseController::class, 'CourseEdit'])->name('course.edit');
    Route::post('/updateCourse/{id}', [CourseController::class, 'CourseUpdate'])->name('course.update');
    Route::get('/removeCourse/{id}', [CourseController::class, 'CourseDelete'])->name('course.remove');

    //................Modules table route..................//

    Route::get('/modules/{id}', [ModuleController::class, 'index'])->name('manage.module');
    Route::get('/modulescreate/{id}', [ModuleController::class, 'create'])->name('module.create');
    Route::post('/modulestore', [ModuleController::class, 'store'])->name('module.store');
    Route::get('/modulesupdate/{id}', [ModuleController::class, 'edit'])->name('module.edit');
    Route::post('/modulesupdate/{id}', [ModuleController::class, 'update'])->name('update.module');
    Route::get('/modulesremove/{id}', [ModuleController::class, 'delete'])->name('module.remove');

    //...........Blogcategory................//
    Route::get('/blogcategory', [BlogCategoryController::class, 'index'])->name('blog.category');
    Route::post('/categoryblog', [BlogCategoryController::class, 'store'])->name('blogcategory.store');
    Route::get('/blogcategoryupdate/{id}', [BlogCategoryController::class, 'edit'])->name('blogcategory.edit');
    Route::post('/blogcategoryupdate/{id}', [BlogCategoryController::class, 'update'])->name('blogcategory.update');
    Route::get('/blogcatremove/{id}', [BlogCategoryController::class, 'destroy'])->name('blogcategory.remove');

    // .............Blog..............//

    Route::get('/manageblog', [BlogController::class, 'index'])->name('blog.index');
    Route::get('/blog', [BlogController::class, 'create'])->name('blog.create');
    Route::post('/blogstore', [BlogController::class, 'store'])->name('blog.store');
    Route::get('/blogupdate/{id}', [BlogController::class, 'edit'])->name('blog.edit');
    Route::post('/blogupdate/{id}', [BlogController::class, 'update'])->name('blog.update');
    Route::get('/blogremove/{id}', [BlogController::class, 'destroy'])->name('blog.destroy');

    //..........pdfsubscription........//

    Route::get('/pdf-subscription', [PdfSubscriptionController::class, 'index'])->name('manage.pdfsubs');
    Route::get('/pdfsubscription', [PdfSubscriptionController::class, 'create'])->name('pdfsubs.create');
    Route::post('/pdfsubs', [PdfSubscriptionController::class, 'store'])->name('pdfsubs.store');
    Route::get('/pdfsubsupdate/{id}', [PdfSubscriptionController::class, 'edit'])->name('pdfsubs.edit');
    Route::post('/pdfsubsupdate/{id}', [PdfSubscriptionController::class, 'update'])->name('pdfsubs.update');
    Route::get('/pdfsubsremove/{id}', [PdfSubscriptionController::class, 'destroy'])->name('pdfsubs.destroy');
    // .........itempdfsubscription.............//
    Route::get('/itempdf', [ItemPdfSubscriptionController::class, 'index'])->name('manage.item');
    Route::get('/item-Pdf', [ItemPdfSubscriptionController::class, 'create'])->name('item.pdfsubs');
    Route::post('/item-Pdfsave', [ItemPdfSubscriptionController::class, 'store'])->name('itempdf.store');
    Route::get('/item-Pdfupdate/{id}', [ItemPdfSubscriptionController::class, 'edit'])->name('itempdf.edit');
    Route::post('/item-Pdfupdate/{id}', [ItemPdfSubscriptionController::class, 'update'])->name('itempdf.update');
    Route::get('/removeitem_pdf/{id}', [ItemPdfSubscriptionController::class, 'delete'])->name('itempdfsubs.destroy');
    // examquestion filter

    Route::get('/filter/{id}', [ExamQuestionController::class, 'filter'])->name('question.filter');
    Route::match(["get", "post"], '/sub', [ExamQuestionController::class, 'submit'])->name('submit.check');

    ///.....................Roles and Permission ........................///

    Route::get('/addadmin', [RoleController::class, 'getAdmin'])->name('add.admin');
    Route::post('/adminrole', [RoleController::class, 'store'])->name('store.role');
    Route::post('/addrole', [RoleController::class, 'store_role'])->name('add.role');
    Route::match(['get', 'post'], '/role', [RoleController::class, 'getRole'])->name('manage.role');

    // .........Admin.............//
    Route::get('/showrole', [RoleController::class, 'get_Addrole'])->name('show.role');
    Route::get('/adminrole', [RoleController::class, 'adminRole'])->name('get.admin');

    ////////................................/////////...........................////////


    Route::get('/show', [ModuleController::class, 'get_Examination'])->name('show.examination');
    Route::get('/addproduct-bookshow', [ProductController::class, 'get_Book'])->name('addproductbook.show');
    Route::get('/Course-productshow', [ProductController::class, 'get_Course'])->name('CourseProduct.show');
    Route::get('/Pdf-productshow', [ProductController::class, 'get_Pdf'])->name('Pdf.Product.show');

    // .............pdf subscription..............//..//

    Route::get('/ebook', [ProductController::class, 'get_PdfSubscription'])->name('pdf.subscription');

    //.........QuizCategory.............//
    Route::get('/quiz', [QuizCategoryController::class, 'index'])->name('quiz.category');
    Route::post('/quizcat', [QuizCategoryController::class, 'store'])->name('quizcat.store');
    Route::get('/quizupdate/{id}', [QuizCategoryController::class, 'edit'])->name('quizcategory.edit');
    Route::post('/quizupdate/{id}', [QuizCategoryController::class, 'update'])->name('quizcategory.update');
    Route::get('/quizremove/{id}', [QuizCategoryController::class, 'destroy'])->name('quizcategory.remove');

    //.............quizSubCategory..............//
    Route::get('/quizSub/{id}', [QuizSubCategoryController::class, 'index'])->name('quiz.Subcategory');
    Route::post('/quizsubcat', [QuizSubCategoryController::class, 'store'])->name('quizsubcat.store');
    Route::get('/quizsubcatupdate/{id}', [QuizSubCategoryController::class, 'edit'])->name('quizSubcat.edit');
    Route::post('/quizsubcatupdate/{id}', [QuizSubCategoryController::class, 'update'])->name('quizSubcat.update');
    Route::get('/quizSubremove/{id}', [QuizSubCategoryController::class, 'destroy'])->name('quizsubcategory.remove');


    //..........quiz chapter.........//
    Route::get('/quiz/chapter/{id}', [QuizChapterController::class, 'index'])->name('quiz.chapter');
    Route::post('/quizchapt', [QuizChapterController::class, 'store'])->name('quizchapter.store');
    Route::get('/quizchaptupdate/{id}', [QuizChapterController::class, 'edit'])->name('quizchapter.edit');
    Route::post('/quizchaptupdate/{id}', [QuizChapterController::class, 'update'])->name('quizchapter.update');
    Route::get('/quizchaptremove/{id}', [QuizChapterController::class, 'destroy'])->name('quizchapter.remove');

    //........QuizTopic..........//
    Route::get('/quiz/topic/{id}', [QuizTopicController::class, 'index'])->name('quiz.topic');
    Route::post('/quiztopic', [QuizTopicController::class, 'store'])->name('quiztopic.store');
    Route::get('/quiztopicupdate/{id}', [QuizTopicController::class, 'edit'])->name('quiztopic.edit');
    Route::post('/quiztopicupdate/{id}', [QuizTopicController::class, 'update'])->name('quiztopic.update');
    Route::get('/quiztopicremove/{id}', [QuizTopicController::class, 'destroy'])->name('quiztopic.remove');

    //.........QuizExamination............//

    Route::get('/quizExamination', [QuizExaminationController::class, 'index'])->name('quiz.examination');
    Route::get('/quizExami', [QuizExaminationController::class, 'create'])->name('quizexamination.create');
    Route::post('/quizExamstore', [QuizExaminationController::class, 'store'])->name('quizexamination.store');
    Route::get('/quizExamupdate/{id}', [QuizExaminationController::class, 'edit'])->name('quizexamination.edit');
    Route::post('/quizExamupdate/{id}', [QuizExaminationController::class, 'update'])->name('quizexamination.update');
    Route::get('/quizexamination/remove/{id}', [QuizExaminationController::class, 'destroy'])->name('quizexamination.remove');

    //..........LiveTest..............//
    Route::get('/live/test', [LiveTestController::class, 'index'])->name('live.test');
    Route::get('/live/testcreate', [LiveTestController::class, 'create'])->name('livetest.create');
    Route::post('/live/teststore', [LiveTestController::class, 'store'])->name('livetest.store');
    Route::get('/manage/liveques/{id}', [LiveTestController::class, 'ques'])->name('manage.livequestion');
    Route::get('/Live/testupdate/{id}', [LiveTestController::class, 'edit'])->name('livetest.edit');
    Route::post('/Live/testupdate/{id}', [LiveTestController::class, 'update'])->name('livetest.update');
    Route::get('/Livetest/remove/{id}', [LiveTestController::class, 'destroy'])->name('livetest.remove');
    Route::get('/live/ques/create/{id}', [LiveTestController::class, 'getliveQuestioncreate'])->name('liveAddQestion.create');
    Route::post('/live/question/save', [LiveTestController::class, 'liveQues'])->name('store.livequestion');
    Route::get('/live/question', [LiveTestController::class, 'getliveSubmit'])->name('store.liveQues');

    //............QuizQuestion...........//

    Route::get('/manage/quizques/{id}', [QuizQuestionController::class, 'index'])->name('manage.quizquestion');
    Route::get('/quiz/ques/create/{id}', [QuizQuestionController::class, 'get_QuizQuestioncreate'])->name('aaaquizquestion.create');
    Route::post('/quizques/store', [QuizQuestionController::class, 'store'])->name('quizquestion.store');
    Route::get('/quizques/update/{id}', [QuizQuestionController::class, 'edit'])->name('quizquestion.edit');
    Route::post('/quizques/update/{id}', [QuizQuestionController::class, 'update'])->name('quizquestion.update');
    Route::get('/quizques/remove/{id}', [QuizQuestionController::class, 'destroy'])->name('quizquestion.delete');
    Route::get('/quiz/question', [QuizQuestionController::class, 'get_QuizSubmit'])->name('store.quiz');
    Route::post('/quiz/question/save', [QuizQuestionController::class, 'QuizQues'])->name('store.quizquestion');


    //..........CourseQuizQuestion..............//

    Route::get('/manage/Cquizques/{id}', [CourseQuizQuestionController::class, 'index'])->name('manage.Cquizquestion');
    Route::get('/quizques/create/{id}', [CourseQuizQuestionController::class, 'create'])->name('coursequizquestion.create');
    Route::post('/quizques/store', [CourseQuizQuestionController::class, 'store'])->name('Cquizquestion.store');
    Route::get('/quizques/update/{id}', [CourseQuizQuestionController::class, 'edit'])->name('Cquizquestion.edit');
    Route::post('/quizques/update/{id}', [CourseQuizQuestionController::class, 'update'])->name('Cquizquestion.update');
    Route::get('/quizques/remove/{id}', [CourseQuizQuestionController::class, 'destroy'])->name('Cquizquestion.destroy');
    Route::post('/quiz/question', [CourseQuizQuestionController::class, 'CourseQuizSubmit'])->name('CquizQues.submit');


    //...........Author Route.................//
    Route::get('/author', [AuthorController::class, 'index'])->name('insert.index');
    Route::post('/author/store', [AuthorController::class, 'store'])->name('author.store');
    Route::get('/update/author/{id}', [AuthorController::class, 'edit'])->name('author.edit');
    Route::post('/update/author/{id}', [AuthorController::class, 'update'])->name('author.update');
    Route::get('/remove/author/{id}', [AuthorController::class, 'destroy'])->name('author.destroy');
    //............CourseQuiz................//
    Route::get('/manage/course/quiz', [CourseQuizController::class, 'index'])->name('manage.course.quiz');
    Route::get('/course/quiz', [CourseQuizController::class, 'create'])->name('course.quiz');
    Route::post('/course/quiz/store', [CourseQuizController::class, 'store'])->name('coursequiz.store');
    Route::get('/course/quiz/update/{id}', [CourseQuizController::class, 'edit'])->name('coursequiz.edit');
    Route::post('/course/quiz/update/{id}', [CourseQuizController::class, 'update'])->name('coursequiz.update');
    Route::get('/course/quiz/remove/{id}', [CourseQuizController::class, 'destroy'])->name('coursequiz.remove');

    //..........ADDAdmin................//
    Route::get('update/admin/{id}', [RoleController::class, 'edit'])->name('admin.edit');
    Route::get('remove/admin/{id}', [RoleController::class, 'destroy'])->name('admin.remove');
    Route::post('update/admin/{id}', [RoleController::class, 'update'])->name('admin.update');

    //........BackgroundImage.............//
    Route::get('/background/image', [BackgroundImageController::class, 'index'])->name('manage.image');
    Route::post('/background/image/store', [BackgroundImageController::class, 'store'])->name('image.store');
    Route::get('/background/image/update/{id}', [BackgroundImageController::class, 'edit'])->name('image.edit');
    Route::post('/background/image/update/{id}', [BackgroundImageController::class, 'update'])->name('image.update');
    Route::get('/background/image/remove/{id}', [BackgroundImageController::class, 'destroy'])->name('image.remove');

    //...........PageProduct..............//
    Route::get('page/product/', [PageProductController::class, 'index'])->name('manage.page');
    Route::post('page/product/store', [PageProductController::class, 'store'])->name('page.store');
    Route::get('page/product/update/{id}', [PageProductController::class, 'edit'])->name('page.edit');
    Route::post('page/product/update/{id}', [PageProductController::class, 'update'])->name('page.update');
    Route::get('page/product/remove/{id}', [PageProductController::class, 'destroy'])->name('page.remove');
    //................image table Route.............................///////////////

    Route::get('/image', [imageController::class, 'index'])->name('manage.image');
    Route::post('/image/store', [imageController::class, 'store'])->name('image.store');
    Route::get('/update/image/{id}', [imageController::class, 'edit'])->name('image.edit');
    Route::post('/update/image/{id}', [imageController::class, 'update'])->name('image.update');
    Route::get('/remove/image/{id}', [imageController::class, 'destroy'])->name('image.delete');

    //.................Page Table.................//

    Route::get('/page', [pageController::class, 'index'])->name('manage.page');
    Route::post('/page/store', [pageController::class, 'store'])->name('page.store');
    Route::get('/update/page/{id}', [pageController::class, 'edit'])->name('page.edit');
    Route::post('/update/page/{id}', [pageController::class, 'update'])->name('page.update');
    Route::get('/remove/page/{id}', [pageController::class, 'destroy'])->name('page.delete');

    //............................TestMonials..................................//
    Route::get('/testi-Monials',[TestimonilsController::class,'index'])->name('manage.Testmonials');
    Route::post('/testi-Monials/store',[TestimonilsController::class,'store'])->name('Testmonials.store');
    Route::get('/testi-Monials/update/{id}',[TestimonilsController::class,'edit'])->name('Testmonials.edit');
    Route::post('/testi-Monials/update/{id}',[TestimonilsController::class,'update'])->name('Testmonials.update');
    Route::get('/testi-Monials/remove/{id}',[TestimonilsController::class,'destroy'])->name('Testmonials.remove');
});

// User middleware
Route::prefix('user')->middleware('auth:web')->group(function () {
    Route::get('/index', [PublicController::class, 'index'])->name('user.index');
});




//..........LiveTest............
Route::get('/live/test', [LiveTestController::class, 'index'])->name('live.test');
Route::get('/live/testcreate', [LiveTestController::class, 'create'])->name('livetest.create');
Route::post('/live/teststore', [LiveTestController::class, 'store'])->name('livetest.store');
Route::get('/Live/testupdate/{id}', [LiveTestController::class, 'edit'])->name('livetest.edit');
Route::post('/Live/testupdate/{id}', [LiveTestController::class, 'update'])->name('livetest.update');
Route::get('/Livetestremove/{id}', [LiveTestController::class, 'destroy'])->name('livetest.remove');


// Route::get('/examqw', function(){
//     return view('manageExamination');
// })