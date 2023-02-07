<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\NavigationController;
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

Route::post('/donations/store', [DonationController::class,'store']);
Route::post('/store', [ContentController::class,'store'])->middleware('auth');
Route::delete('/delete/{id}', [ContentController::class,'delete'])->middleware('auth');
Route::put('/edit/{id}', [ContentController::class,'edit'])->middleware('auth');
Route::put('/slider/change/{id}', [ContentController::class,'changeImage'])->middleware('auth');
Route::delete('/gallery/delete/{id}', [ImageController::class,'delete'])->middleware('auth');
Route::post('/gallery/store', [ImageController::class,'store'])->middleware('auth');
Route::put('/gallery/change/{id}', [ImageController::class,'change'])->middleware('auth');
Route::put('/change', [AuthController::class,'changePassword'])->middleware('auth');
Route::get('/admin/{page}', [NavigationController::class,'dash'])->middleware('auth','prevent-back-history')->name('dashboard');
Route::delete('/logout', [AuthController::class,'logout'])->middleware('auth');
Route::get('/login', [NavigationController::class,'login'])->middleware('guest','prevent-back-history')->name('login');
Route::post('/authenticate', [AuthController::class,'login']);
Route::post('/send', [EmailController::class,'send']);
Route::get('/{lang}/{page}', [NavigationController::class,'render']);
Route::get('/', [NavigationController::class,'render']);
