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
    'register' => false,
    'reset' => false,
    'verify' => false
]);

Route::middleware(['auth'])->group(function () {
    Route::view('dashboard', 'user/dashboard')->name('user.dashboard');
});

Route::view('/', 'public/index');
Route::view('cadastro', 'public/cadastro');

Route::post('sing-up', [App\Http\Controllers\Cadastro::class, 'create']);

require __DIR__.'/auth.php';
