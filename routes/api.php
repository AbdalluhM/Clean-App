<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Api\HomePageController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\RecieveController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\SupCategoryController;

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



// auth
Route::post('auth/signin', [AuthController::class, 'signin']);
Route::post('auth/signup', [AuthController::class, 'signup']);
Route::post('auth/signin/social', [AuthController::class, 'loginSocial']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('update/social/phone',[AuthController::class,'update_social_phone']);
    Route::post('auth/signout', [AuthController::class, 'signout']);
    Route::post('auth/change-password', [AuthController::class, 'change_password']);
});



// category
Route::get('category', [CategoryController::class, 'index']);

// sup category
Route::get('supcategory', [SupCategoryController::class, 'index']);
Route::get('supcategory/details', [SupCategoryController::class, 'sup_category']);
Route::get('supcategory/search', [SupCategoryController::class, 'search']);



// slider
Route::get('slider', [HomePageController::class, 'slider']);

// cart
Route::middleware('auth:sanctum')->group(function () {

    Route::get('carts', [CartController::class, 'index'])->name('carts.index');
    Route::post('cart/store', [CartController::class, 'store'])->name('carts.create');
});


// recieve
Route::middleware('auth:sanctum')->group(function () {

    Route::post('recieve/store', [RecieveController::class, 'store'])->name('store_recieve');
    Route::get('recieve', [RecieveController::class, 'index'])->name('recieve');

});


// home page
Route::get('home/categories', [HomePageController::class, 'categories']);
Route::get('home/bestservice', [HomePageController::class, 'best_services']);
Route::get('home/services', [HomePageController::class, 'service']);


// firbase
Route::middleware('auth:sanctum')->group(function () {
    //..Other routes

// Route::post('send-notification', [App\Http\Controllers\NotificationController::class, 'send']);
    Route::post('/fcm-token', [NotificationController::class, 'updateToken'])->name('fcmToken');

});


// notification


Route::middleware('auth:sanctum')->group(function () {

    Route::get('/notify', [NotificationController::class, 'index'])->name('notification');

});






