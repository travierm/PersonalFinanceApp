<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserConfigController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function() {
    Route::get('/user/settings', [UserConfigController::class, 'getConfig']);
    Route::post('/user/settings', [UserConfigController::class, 'updateConfig']);
});
