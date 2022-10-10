<?php

use Illuminate\Support\Facades\Route;
use Workable\User\Http\Controllers\ApiUserController;
use Workable\User\Http\Controllers\ApiUserSettingController;
use Workable\User\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web Routes for your application. These
| Routes are loaded by the RouteServiceProvider within a group which
| contains the "web" Middleware group. Now create something great!
|
*/

// main
Route::get('/setting', [UserController::class, 'index'])->name('index');





// api
Route::post('/setting/updateProfile', [ApiUserController::class, 'updateProfile'])->name('updateProfile');
Route::post('/setting/updatePassword', [ApiUserController::class, 'updatePassword'])->name('updatePassword');
Route::post('/setting/updateNotification', [ApiUserController::class, 'updateNotification'])->name('updateNotification');
Route::post('/setting/updateSetting', [ApiUserController::class, 'updateSetting'])->name('updateSetting');

