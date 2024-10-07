<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\HomeController;
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
    return view('welcome');
});

//ROUTE HOMEPAGE
Route::controller(HomeController::class)->group(function(){

});

//ROUTE CONTENT
Route::controller(ContentController::class)->group(function(){

});


//ROUTE ADMIN
Route::controller(AdminController::class)->group(function(){

});

//ROUTE AUTH
Route::controller(AuthController::class)->group(function(){

});
