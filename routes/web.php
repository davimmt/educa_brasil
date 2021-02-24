<?php

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

Auth::routes([
    'reset' => false,
    'verify' => false
]);

Route::middleware(['auth'])->group(function () {
    Route::view('dashboard', 'user/dashboard')->name('dashboard');

    Route::resource('artigos', App\Http\Controllers\ArticleController::class);
    Route::get('search/artigos', [App\Http\Controllers\ArticleController::class, 'search'])->name('search.artigos');

    Route::resource('pecas', App\Http\Controllers\PieceController::class);
    Route::get('search/pecas', [App\Http\Controllers\PieceController::class, 'search'])->name('search.pecas');
});

Route::view('/', 'public/index');
Route::view('sobre', 'public/sobre');
Route::view('cadastro', 'public/cadastro');
Route::post('sing-up', [App\Http\Controllers\ClientController::class, 'create']);

Route::name('p.')->prefix('p')->group(function () {
    Route::resource('artigos', App\Http\Controllers\PublicArticleController::class, ['only' => ['index', 'show']]);
    Route::get('search/artigos', [App\Http\Controllers\PublicArticleController::class, 'search'])->name('search.artigos');
    Route::resource('pecas', App\Http\Controllers\PublicPieceController::class, ['only' => ['index', 'show']]);
    Route::get('search/pecas', [App\Http\Controllers\PublicPieceController::class, 'search'])->name('search.pecas');
});