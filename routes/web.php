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

Route::get('/many-to-many-pivot', function () {
    $user = \App\Models\User::with('permissions')->find(12);
    $user->permissions()->attach([1 => ['active' => false]]);

    return response()->json($user->permissions);
});

//Relacionamento polimórficos

Route::get('/one-to-one-polymorphic', function () {
    $user = \App\Models\User::first();

    if ($user->image) {
        $user->image()->update(['path' => 'nome-image-update.png']);
    } else {
        $user->image()->create(['path' => 'nome-image.png']);
    }

    return response()->json($user->image);
});


Route::get('/one-to-many-polymorphic', function () {
    $course = \App\Models\Course::first();

    $course->comments()->create([
        'subject' => 'Quarto comentário - ASSUNTO',
        'content' => 'Quarto comentário - CONTEÚDO',
    ]);

    return response()->json($course->comments);

    //Retornar quem fez o comentário de id 1
    $comment = \App\Models\Comment::find(1);

    return response()->json($comment->commentable);
});

Route::get('/many-to-many-polymorphic', function () {
    $course = \App\Models\Course::first();

    //anexando
    $course->tags()->attach(1);
    $course->tags()->attach(2);

    //desanexando
    $course->tags()->detach(1);

    return response()->json($course->tags);

    //Retornar usuários que possuem a tag de id 2
    $tag = \App\Models\Tag::find(2);

    return response()->json($tag->users);
});
