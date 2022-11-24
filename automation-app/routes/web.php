<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Panel\Auth\RegisterController;
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

//Auth
Route::prefix('oauth')->namespace('Panel\Auth')->group(function () {
    Route::post('register', [RegisterController::class, 'register']);
    Route::post('login', 'LoginInitController@login');
});