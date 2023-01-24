<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmailController;
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

Route::put('/change', [AuthController::class,'changePassword'])->middleware('auth');
Route::get('/dashboard', [NavigationController::class,'dash'])->middleware('auth','prevent-back-history');
Route::delete('/logout', [AuthController::class,'logout'])->middleware('auth');
Route::get('/login', [NavigationController::class,'login'])->middleware('guest','prevent-back-history')->name('login');
Route::post('/authenticate', [AuthController::class,'login']);
Route::post('/send', [EmailController::class,'send']);
Route::get('/{lang}/{page}', [NavigationController::class,'render']);
Route::get('/', [NavigationController::class,'render']);
