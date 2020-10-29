<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserConfigController;
use App\Http\Controllers\User\UserTransactionTagController;

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
    // User Routes
    Route::get('/user/config', [UserConfigController::class, 'getConfig']);
    Route::post('/user/config', [UserConfigController::class, 'updateConfig']);

    Route::get('/user/tags', [UserTransactionTagController::class, 'showTags']);
    Route::get('/user/tags/delete/{id}', [UserTransactionTagController::class, 'deleteTag']);

    Route::post('/user/tags', [UserTransactionTagController::class, 'createTag']);
});
