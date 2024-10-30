<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


//ROUTE HOMEPAGE
Route::controller(HomeController::class)->group(function(){
    Route::get('/', 'index');
    Route::get('/surah/{id}', 'show');
});

//ROUTE ADMIN
Route::controller(AdminController::class)->group(function(){

});

//ROUTE AUTH
Route::controller(AuthController::class)->group(function(){
<<<<<<< HEAD
    Route::get('/admin/login', 'index')->name("admin.login")->middleware(NotAuthenticate::class);
    Route::post('/auth/login', 'signIn')->name("admin.signin");
});

//ROUTE KAJIAN

//ADD MIDDLEWARE HERE
Route::controller(\App\Http\Controllers\KajianController::class)->group(function (){
    Route::get('/admin/kajian', 'index')->name('admin.kajian')->middleware('auth');
    Route::get('/admin/kajian/add', 'create')->name('admin.kajian.add')->middleware('auth');
});
Route::controller(\App\Http\Controllers\SunnahController::class)->group(function (){
    Route::get('/admin/sunnah', 'index')->name('admin.sunnah')->middleware('auth');
=======
    Route::get('/admin/signin', 'index');
    Route::post('/admin/signin', 'signIn');
    Route::get('/admin/signout', 'signOut');
>>>>>>> d319bca2507e533875a82ab0afea40c2a965a180
});
