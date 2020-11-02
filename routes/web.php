<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\User\UserConfigController;
use App\Http\Controllers\User\UserTransactionTagController;
use App\Http\Controllers\User\UserTransactionSourceController;

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

Route::middleware(['auth'])->group(function() {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'getIndex']);

    // User Config
    Route::get('/user/config', [UserConfigController::class, 'getConfig']);
    Route::post('/user/config', [UserConfigController::class, 'updateConfig']);

    // Tags
    Route::get('/user/tags', [UserTransactionTagController::class, 'showTags']);
    Route::get('/user/tags/delete/{id}', [UserTransactionTagController::class, 'deleteTag']);

    Route::post('/user/tags', [UserTransactionTagController::class, 'createTag']);

    // Sources
    Route::get('/user/sources', [UserTransactionSourceController::class, 'showSources']);
    Route::get('/user/source/delete/{id}', [UserTransactionSourceController::class, 'deleteSource']);

    Route::post('/user/sources', [UserTransactionSourceController::class, 'createSource']);

    // Transactions
    Route::get('/transactions', [TransactionController::class, 'getList']);
    Route::get('/transaction/create', [TransactionController::class, 'getCreate']);
    Route::get('/transaction/delete/tag/{transactionTagId}', [TransactionController::class, 'deleteTransactionTag']);
    Route::post('/transaction/create', [TransactionController::class, 'postCreate']);
    Route::post('/transaction/update/source', [TransactionController::class, 'updateTransactionSource']);
    Route::post('/transaction/create/tag', [TransactionController::class, 'createTransactionTag']);
});
