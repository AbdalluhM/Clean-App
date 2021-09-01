<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\PermissionController;
use App\Http\Controllers\Wep\CategoryController;
use App\Http\Controllers\Wep\CustomerController;
use App\Http\Controllers\Wep\RecieveController;
use App\Http\Controllers\Wep\ServiceController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::get('/', function () {
    return view('Auth.login');
});

// route customers


// route dashboard
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::get('/home', [HomeController::class, 'index'])->name('home');
    }
);

// route category
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth:admin']
    ],
    function () {

        Route::resource('categories', CategoryController::class);
    }
);

// route recieves
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth:admin']
    ],
    function () {

        Route::get('recieves', [RecieveController::class, ('index')])->name('recieves.index');
        Route::get('recieves/{id}/details', [RecieveController::class, ('details')])->name('recieves.details');
        Route::get('recieves/{id}/emp', [RecieveController::class, ('add_emp')])->name('recieves.emp');
        Route::post('recieves/{id}/emp/store', [RecieveController::class, ('store_emp')])->name('recieves.emp.store');
    }
);

// route customers
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth:admin']
    ],
    function () {

        Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
        Route::get('/customers/{id}/details', [CustomerController::class, 'customer_details'])->name('customers.details');
        // Route::get('/customers/{id}/details/', [CustomerController::class, 'customer_details'])->name('customers.details');
    }
);

// route Services
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth:admin']
    ],
    function () {

        Route::resource('services', ServiceController::class);
    }
);

// route fire base

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::patch('/fcm-token', [HomeController::class, 'updateToken'])->name('fcmToken');
Route::post('/send-notification',[HomeController::class,'notification'])->name('notification');

// Route::get('test', function () {

//     return view('dashboard.dashboard');
// });


// route auth

Auth::routes([
    'register' => false,
    'login' => false,
]);
Route::get('login/admin', [LoginController::class, ('showLoginForm')])->name('login');
Route::post('login/admin', [LoginController::class, ('loginAdmin')])->name('login.admin');

// roles...permission...admin
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:admin']
    ],
    function () {
        Route::get('profile/user', [AdminController::class, ('profile_user')])->name('profile.index');
        Route::resource('roles', RoleController::class);
        Route::resource('users', AdminController::class);
        Route::get('permission', [PermissionController::class, ('index')])->name('permission.index');
    }
);
