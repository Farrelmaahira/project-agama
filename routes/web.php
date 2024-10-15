<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\NotAuthenticate;
use Illuminate\Mail\Mailables\Content;
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

Route::get('/', function () {
    return view('user.welcome');
});

//ROUTE HOMEPAGE
Route::controller(HomeController::class)->group(function(){
    Route::get('/', 'index');
    Route::get('/surah/{id}/{slug}', 'show')->name('surah.show');
});

//ROUTE ADMIN
Route::controller(AdminController::class)->group(function(){

});

//ROUTE AUTH
Route::controller(AuthController::class)->group(function(){
    Route::get('/admin/login', 'index')->name("admin.login")->middleware(NotAuthenticate::class);
    Route::post('/auth/login', 'signIn')->name("admin.signin");
});

//ROUTE KAJIAN

//ADD MIDDLEWARE HERE
Route::controller(\App\Http\Controllers\KajianController::class)->group(function (){
    Route::get('/admin/kajian', 'index')->name('dashboard')->middleware('auth');
});
