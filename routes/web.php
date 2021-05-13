<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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
    return view('index');
});

Route::get('/inscription', [RegisterController::class, 'index'])->name('inscription');
Route::post('/inscription', [RegisterController::class, 'store'])->name('inscription.store');
Route::get('/connexion', [LoginController::class, 'index'])->name('connexion');

