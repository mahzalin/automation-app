<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Panel\Auth\RegisterController;
use App\Http\Controllers\Panel\Auth\LoginController;
use App\Http\Controllers\Panel\HomeController;
use App\Http\Controllers\Panel\Payment\ListController;
use App\Http\Controllers\Panel\Payment\AddController;
use App\Http\Controllers\Panel\File\DownloadController;
use App\Http\Controllers\Backoffice\Payment\ListController as BackofficeListController;
use App\Http\Controllers\Backoffice\Payment\EditController;
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
    return view('home');
});

Route::prefix('automation')->namespace('Panel')->middleware('authentication')->group(function () {
    Route::get('/', [HomeController::class, 'home']);
});

//Auth
Route::prefix('oauth')->namespace('Panel\Auth')->group(function () {
    Route::get('register', [RegisterController::class, 'getRegister']);
    Route::post('register', [RegisterController::class, 'register'])->name('register');
    Route::get('login', [LoginController::class, 'getLogin']);
    Route::post('login', [LoginController::class, 'login'])->name('login');
    Route::get('logout', [LoginController::class, 'logout'])->middleware('authentication');
});

//Payment
Route::prefix('payment')->namespace('Panel\Payment')->middleware('authentication')->group(function () {
    Route::get('/', [ListController::class, 'index']);
    Route::get('/add', [AddController::class, 'getAddRequest']);
    Route::post('/add', [AddController::class, 'addRequest'])->name('addPayment');
});

//File
Route::prefix('File')->namespace('Panel\File')->middleware('authentication')->group(function () {
    Route::get('/download/{id}', [DownloadController::class, 'downloadFile'])->name('downloadFile');
});


// Backoffice routes
Route::prefix('backoffice')->namespace('Panel\File')->middleware('authentication')->group(function () {
    //Payment
    Route::prefix('payment')->namespace('Panel\Payment')->group(function () {
        Route::get('/', [BackofficeListController::class, 'index'])->middleware('permission:payment_list');
        Route::get('/edit/{id}', [EditController::class, 'getEdit'])->middleware('permission:payment_edit');
        Route::put('/edit/{id}', [EditController::class, 'edit'])->middleware('permission:payment_edit');
        Route::put('/editStatus/{id}', [EditController::class, 'changeStatus'])->middleware('permission:payment_status_changing');
    });
});
