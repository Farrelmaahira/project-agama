<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KajianController;
use App\Http\Controllers\SunnahController;
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
    Route::get('/', 'index')->name('surah');
    Route::get('/surah/{id}', 'show')->name('surah.show');
});

Route::controller(KajianController::class)->group(function(){
    Route::get('/admin/dashboard', 'index')->name('admin.kajian');
    Route::get('/admin/kajian/add', 'create')->name('admin.kajian.add');
    Route::post('/admin/kajian/store', 'store')->name('admin.kajian.store');
    Route::get('admin/kajian/edit/{id}', 'edit')->name('admin.kajian.edit');
    Route::put('admin/kajian/update/{id}', 'update')->name('admin.kajian.update');
    Route::get('admin/kajian/delete/{id}', 'destroy')->name('admin.kajian.destroy');
    Route::get('admin/kajian/show/{id}', 'show')->name('admin.kajian.show');
})->middleware('auth');

Route::controller(SunnahController::class)->group(function(){
    Route::get('/admin/sunnah', 'index')->name('admin.sunnah');
});
//ROUTE AUTH
Route::controller(AuthController::class)->group(function(){
    Route::get('/admin/signin', 'index')->middleware('alreadyAuthenticated');
    Route::post('/admin/signin', 'signIn')->name('admin.signin');
    Route::get('/admin/signout', 'signOut')->middleware('auth');
});
