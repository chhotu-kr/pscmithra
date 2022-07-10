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
Route::get("sign", [Apiv1Controller::class, "index"])->name("api.sign");
Route::post("signup", [Apiv1Controller::class, "api_signup"])->name("api.signup");


//category
Route::get('/category/{id}',[Apiv1Controller::class,'category'])->name('api.category');
Route::get('/subcategory/{id}',[Apiv1Controller::class,'subcategory'])->name('api.subcategory');


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
