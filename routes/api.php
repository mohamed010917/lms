<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;

Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [LoginController::class, 'login']);
Route::post('me', [LoginController::class, 'me']);
Route::post('logout', [LoginController::class, 'logout']);
Route::post('forgot-password', [ForgotPasswordController::class, 'forgotPassword']);


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

use App\Http\Controllers\PaymentController;

Route::get('/payment', [PaymentController::class, 'payment'])->name('payment');
Route::get('/cancel', [PaymentController::class, 'cancel'])->name('payment.cancel');
Route::get('/success/{user_id}', [PaymentController::class, 'success'])->name('payment.success');
Route::get("home",function(){
    return "home" ;
})->name("home");
Route::get("error",function(){
    return "error" ;
})->name("error");