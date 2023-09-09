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

Route::group(['prefix' => 'users'], function () {
    Route::get('/', [UserController::class, 'index'])->name('preferences.index');
    Route::post('/', [UserController::class, 'store'])->name('preferences.store');
    Route::put('/{id}', [UserController::class, 'update'])->name('preferences.update');
});

Route::group(['prefix' => 'preference'], function () {
    Route::get('/{userId}', [PreferenceController::class, 'show'])->name('preferences.show');
    Route::get('/', [PreferenceController::class, 'index'])->name('preferences.index');
    Route::post('/', [PreferenceController::class, 'store'])->name('preferences.store');
    Route::put('/{userId}', [PreferenceController::class, 'update'])->name('preferences.update');
});
