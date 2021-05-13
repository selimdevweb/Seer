<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\DashboardController;

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

Route::get('/inscription', [RegisterController::class, 'index'])->name('inscription')->middleware('guest');
Route::post('/inscription', [RegisterController::class, 'store'])->name('inscription.store')->middleware('guest');
Route::get('/connexion', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('user.dashboard')->middleware('auth');
/* Route::get('/deconnexion', [LogoutController::class, 'destroy'])->name('user.logout')->middleware('auth'); */

/* Git Push */
