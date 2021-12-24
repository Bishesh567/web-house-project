<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AboutUsController;
use App\Http\Controllers\Backend\AssociatesController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SiteSettingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\RegisterUserController;
use App\Http\Controllers\Front\DefaultController;
use App\Http\Controllers\Backend\EventController;
use App\Http\Controllers\Backend\TestimonialController;
use App\Http\Controllers\Front\ContactusController;
use App\Http\Controllers\Front\OrderDetailsController;
use App\Http\Controllers\SubscribeController;

use Illuminate\Support\Facades\Auth;


Route::group(['middleware' => 'auth'], function () {
    Route::match(['get', 'post'], '/dashboard', [AdminController::class, 'dashboard']);
    Route::resource('/admin/flims', AssociatesController::class);
    Route::resource('/admin/banner', BannerController::class);
    Route::resource('/admin/aboutus', AboutUsController::class);
    Route::resource('/admin/testimonial', TestimonialController::class);
    Route::resource('/admin/sitesetting', SiteSettingController::class);
    Route::resource('/admin/services',EventController::class);
    Route::resource('/admin/contact', ContactusController::class);
    Route::match(['get','post'],'/admin/message-details/{id}',[ContactusController::class,'messageDetails']);
    Route::match(['get','post'],'/admin/delete-message/{id}',[ContactusController::class,'deleteMessage'])->name('delete-message');
});
Route::match(['get', 'post'], '/', [DefaultController::class, 'index']);
Route::match(['get', 'post'], '/login', [AdminController::class, 'login'])->name('login');
Route::get('/loguot', [AdminController::class, 'logout']);
Route::post('/send-message',[ContactusController::class,'save']);
Route::get('/filmwithus', [DefaultController::class,'filmwithus'])->name('film');
Route::post('/filmwithus', [DefaultController::class,'filmwithusform'])->name('filmWithUs');
Route::post('/workwithus', [DefaultController::class,'workwithusform'])->name('workWithUs');



