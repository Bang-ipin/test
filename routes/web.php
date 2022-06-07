<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
Route::prefix('admin')->group(function () {
    Route::get('/home', [App\Http\Controllers\Admin\HomeController::class, 'index']);
    Route::get('/profile', [App\Http\Controllers\Admin\HomeController::class, 'profil']);
    
    //// USER ///////
    Route::get('/user', [App\Http\Controllers\Admin\UserController::class, 'index']);
    Route::post('/user', [App\Http\Controllers\Admin\UserController::class, 'show']);
    Route::get('/user/create', [App\Http\Controllers\Admin\UserController::class, 'create']);
    Route::post('/user/cekemail', [App\Http\Controllers\Admin\UserController::class, 'cekemail']);

    //// CUSTOMER ///////
    Route::get('/customer', [App\Http\Controllers\Admin\CustomerController::class, 'index']);
    Route::get('/customer/create', [App\Http\Controllers\Admin\CustomerController::class, 'create']);
    Route::post('/customer/store', [App\Http\Controllers\Admin\CustomerController::class, 'store']);
    Route::get('/customer/{id}/edit', [App\Http\Controllers\Admin\CustomerController::class, 'edit']);
    Route::post('/customer/update', [App\Http\Controllers\Admin\CustomerController::class, 'update']);
    Route::delete('/customer/destroy', [App\Http\Controllers\Admin\CustomerController::class, 'destroy']);
    Route::post('/customer', [App\Http\Controllers\Admin\CustomerController::class, 'loaddata']);

});
