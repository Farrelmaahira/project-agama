<?php

use App\Http\Controllers\Core;
use App\Http\Controllers\KajianController;
use App\Http\Controllers\SunnahController;
use App\Models\Kajian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redis;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/admin/kajian', [KajianController::class, 'store']);
Route::get('/admin/kajian', [KajianController::class, 'index']);
Route::get('/admin/kajian/{id}', [KajianController::class, 'show']);
Route::put('/admin/kajian/{id}', [KajianController::class, 'update']);
Route::delete('/admin/kajian/{id}', [KajianController::class, 'destroy']);


Route::controller(SunnahController::class)->group(function(){
    Route::get('/admin/sunnah', 'index');
    Route::post('/admin/sunnah', 'store');
    Route::get('/admin/sunnah/{id}', 'show');
    Route::put('/admin/sunnah/{id}', 'update');
    Route::delete('/admin/sunnah/{id}', 'destroy');
});


