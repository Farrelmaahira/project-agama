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
    Route::get('/admin/signin', 'index');
    Route::post('/admin/signin', 'signIn');
    Route::get('/admin/signout', 'signOut');
});
