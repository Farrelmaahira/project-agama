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
    Route::get('/surah/{id}/{slug}', 'show')->name('surah.show');
});

Route::controller(KajianController::class)->middleware('auth')->group(function(){
    Route::get('/admin/dashboard', 'index')->name('admin.kajian');
    Route::get('/admin/kajian/add', 'create')->name('admin.kajian.add');
    Route::post('/admin/kajian/store', 'store')->name('admin.kajian.store');
    Route::get('/admin/kajian/edit/{id}', 'edit')->name('admin.kajian.edit');
    Route::put('/admin/kajian/update/{id}', 'update')->name('admin.kajian.update');
    Route::get('/admin/kajian/delete/{id}', 'destroy')->name('admin.kajian.destroy');
    Route::get('/admin/kajian/show/{id}', 'show')->name('admin.kajian.show');
});

Route::controller(SunnahController::class)->group(function(){
    Route::get('/admin/sunnah', 'index')->name('admin.sunnah');
    Route::get('admin/sunnah/add', 'create')->name('admin.sunnah.create');
    Route::post('/admin/sunnah/add', 'store')->name('admin.sunnah.add');
    Route::get('/admin/sunnah/edit/{id}', 'edit')->name('admin.sunnah.edit');
    Route::put('/admin/sunnah/update/{id}', 'update')->name('admin.sunnah.update');
    Route::get('/admin/sunnah/delete/{id}', 'destroy')->name('admin.sunnah.delete');
});
//ROUTE AUTH
Route::controller(AuthController::class)->group(function(){
    Route::get('/admin/signin', 'index')->middleware('alreadyAuthenticated');
    Route::post('/admin/signin', 'signIn')->name('admin.signin');
    Route::get('/admin/signout', 'signOut')->name('admin.logout')->middleware('auth');
});

Route::controller(\App\Http\Controllers\UserKajianController::class)->group(function (){
    Route::get('/kajian', 'index')->name('kajian');
    Route::get('/kajian/{id}', 'show')->name('kajian.show');
});
Route::controller(\App\Http\Controllers\UserSunnahController::class)->group(function (){
    Route::get('/sunnah', 'index')->name('sunnah');
    Route::get('/sunnah/{id}', 'show')->name('sunnah.show');
});
