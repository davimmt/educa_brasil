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
    Route::get('artigos/search', [App\Http\Controllers\ArticleController::class, 'search'])->name('artigos.search');

    Route::resource('pecas', App\Http\Controllers\PieceController::class);
    Route::get('pieces/search/', [App\Http\Controllers\PieceController::class, 'search'])->name('pecas.search');
});

Route::view('/', 'public/index');
Route::view('cadastro', 'public/cadastro');

Route::post('sing-up', [App\Http\Controllers\ClientController::class, 'create']);
