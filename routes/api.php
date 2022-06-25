<?php
use App\Http\Controllers\ApiExamController;
use App\Http\Controllers\ApiSubjectController;
use App\Http\Controllers\ApiCartController;
use App\Http\Controllers\ApiCategoryController;
use App\Http\Controllers\ApiCouponController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::apiResource('exam',ApiExamController::class);
Route::apiResource('subject',ApiSubjectController::class);
Route::apiResource('cart',ApiCartController::class);
Route::apiResource('category',ApiCategoryController::class);
Route::apiResource('coupon',ApiCouponController::class);
Route::apiResource('subcategory',App\Http\Controllers\ApiSubCategoryController::class);
Route::apiResource('examination',App\Http\Controllers\ApiExaminationController::class);
Route::apiResource('topic',App\Http\Controllers\TopicApiController::class);
Route::apiResource('screenshot',App\Http\Controllers\TopicApiController::class);
Route::apiResource('question',App\Http\Controllers\QuestionApiController::class);
Route::apiResource('language',App\Http\Controllers\LanguageApiController::class);
Route::apiResource('product',App\Http\Controllers\ProductApiController::class);
Route::apiResource('secondquestion',App\Http\Controllers\ApiSecondQuestionController::class);
Route::apiResource('membership',App\Http\Controllers\ApiMembershipController::class);
Route::apiResource('pdf',App\Http\Controllers\ApiPdfController::class);
Route::apiResource('address',App\Http\Controllers\ApiAddressController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
