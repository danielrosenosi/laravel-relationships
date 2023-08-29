<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\PreferenceController;
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

Route::get('/users', [UserController::class, 'index'])->name('users.index');

Route::group(['prefix' => 'preferences'], function () {
    Route::get('/', [PreferenceController::class, 'index'])->name('preferences.index');
});

Route::get('/', function () {
    return view('welcome');
});
