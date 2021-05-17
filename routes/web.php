<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Users\FileController;
use App\Http\Controllers\Admin\AdminBilleterie;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminUsersController;
use App\Http\Controllers\Admin\AdminLogoutController;
use App\Http\Controllers\Admin\AdminDashboardController;

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

/* HOME */
    Route::get('/', [HomeController::class, 'index'])->name('home');

/* USER */

    // INSCRIPTION
    Route::get('/inscription', [RegisterController::class, 'index'])->name('inscription')->middleware('guest');
    Route::post('/inscription', [RegisterController::class, 'store'])->name('inscription.store')->middleware('guest');

    // CONNEXION
    Route::get('/connexion', [LoginController::class, 'index'])->name('login')->middleware('guest');
    Route::post('/connexion', [LoginController::class, 'store'])->name('login.store')->middleware('guest');

    // DASHBOARD
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('user.dashboard')->middleware('auth');
    Route::post('/dashboard', [FileController::class, 'store'])->name('file.store')->middleware('auth');

    // DECONNEXION
    Route::get('/deconnexion', [LogoutController::class, 'destroy'])->name('user.logout')->middleware('auth');

/* ADMIN */

    // CONNEXION
    Route::get('/admin-connexion', [AdminLoginController::class, 'index'])->name('admin_login')->middleware('guest');
    Route::post('/admin-connexion', [AdminLoginController::class, 'store'])->name('admin_login.store')->middleware('guest');

    // DASHBOARD
    Route::get('/admin-dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard')->middleware('auth');
    Route::post('/admin-dashboard', [AdminDashboardController::class, 'store'])->name('admin.dashboard')->middleware('auth');

    // BILLETERIE
   /*  Route::get('/admin-billeterie', [AdminBilleterie::class, 'index'])->name('user.dashboard')->middleware('auth');
    Route::post('/admin-billeterie', [AdminBilleterie::class, 'store'])->name('file.store')->middleware('auth'); */

    // USERS
    /* Route::get('/admin-users', [AdminUsersController::class, 'index'])->name('user.dashboard')->middleware('auth');
    Route::post('/admin-users', [AdminUsersController::class, 'store'])->name('file.store')->middleware('auth'); */

    // DECONNEXION
    Route::get('/admin-deconnexion', [AdminLogoutController::class, 'destroy'])->name('admin.logout')->middleware('auth');
