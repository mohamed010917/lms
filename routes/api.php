<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Models\file ;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CoursesController ;
use App\Http\Middleware\UserPay ;
//auth routes
Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [LoginController::class, 'login']);
Route::post('me', [LoginController::class, 'me']);
Route::post('logout', [LoginController::class, 'logout']);
Route::post('forgot-password', [ForgotPasswordController::class, 'forgotPassword']);

mm;
Route::middleware('auth:sanctum')->group(function(){
    //payment
    Route::get('/payment', [PaymentController::class, 'payment'])->name('payment');
    Route::get('/cancel', [PaymentController::class, 'cancel'])->name('payment.cancel');
    Route::get('/success/{user_id}', [PaymentController::class, 'success'])->name('payment.success');
}
);



route::get("allCourse",[CoursesController::class,"allCourse"])->name("allCourse");
route::get("topCourse",[CoursesController::class,"topCourse"])->name("topCourse");

Route::middleware(['auth:sanctum' ,UserPay::class])->group(function(){
    // course
    route::get("YourCourse",[CoursesController::class,"YourCourse"])->name("YourCourse");
    route::get("showCourse/{id}",[CoursesController::class,"showCourse"])->name("showCourse");
    route::post("intoCourse/{id}",[CoursesController::class,"intoCourse"])->name("intoCourse");
    route::post("outCourse/{id}",[CoursesController::class,"outCourse"])->name("outCourse");
    route::post("revieCourse",[CoursesController::class,"revieCourse"])->name("revieCourse");
    //opside
   
});