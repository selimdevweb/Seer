<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;


use App\Http\Controllers\HomeController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Users\FileController;


use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\CheckoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\Admin\SeerInfosController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminUsersController;
use App\Http\Controllers\Admin\AdminLogoutController;
use App\Http\Controllers\Admin\BilletterieController;
use App\Http\Controllers\Admin\UtilisateurController;
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

    Route::get('/seer-infos', function(){
        return view('SEER.seer_infos');
    })->name('seer_infos');

    Route::get('/seer-team', function(){
        return view('SEER.team_seer');
    })->name('seer_team');

/* USER */

    // INSCRIPTION
    Route::get('/inscription', [RegisterController::class, 'index'])->name('inscription')->middleware('guest');
    Route::post('/inscription', [RegisterController::class, 'store'])->name('inscription.store')->middleware('guest');

    // CONNEXION
    Route::get('/connexion', [LoginController::class, 'index'])->name('login')->middleware('guest');
    Route::post('/connexion', [LoginController::class, 'store'])->name('login.store')->middleware('guest');

    // MOT DE PASSE OUBLIE
    Route::get('/mot-de-passe-oublie', [ForgotPasswordController::class, 'getEmail'])->name('index.password');
    Route::post('/mot-de-passe-oublie', [ForgotPasswordController::class, 'postEmail'])->name('store.password');

    Route::get('/nouveau-mot-de-passe/{token}', [ResetPasswordController::class, 'getPassword'])->name('index.reset');
    Route::post('/nouveau-mot-de-passe', [ResetPasswordController::class, 'updatePassword'])->name('store.reset');

    // DASHBOARD
    Route::get('/profil', [DashboardController::class, 'index'])->name('user.dashboard')->middleware('auth');
    Route::post('/profil', [FileController::class, 'store'])->name('file.store')->middleware('auth');
    Route::post('/profil/{id}', [FileController::class, 'destroy'])->name('file.destroy')->middleware('auth');

    // PANIER
    Route::get('/ajout-panier/{billetterie}', [CartController::class, 'add'])->name('add.cart')->middleware('auth');
    Route::get('/panier', [CartController::class, 'index'])->name('index.cart')->middleware('auth');
    Route::get('/panier/supprimer/{id}', [CartController::class, 'destroy'])->name('cart.destroy')->middleware('auth');
    Route::get('/panier/update/{id}', [CartController::class, 'update'])->name('cart.update')->middleware('auth');

    // CHECKOUT
    Route::get('/paiement', [CheckoutController::class, 'index'])->name('user.checkout')/* ->middleware('auth') */;
    Route::post('/paiement/{id}', [CheckoutController::class, 'makePayment'])->name('make-payment');

    // DECONNEXION
    Route::get('/deconnexion', [LogoutController::class, 'destroy'])->name('user.logout')->middleware('auth');

/* ADMIN */

    // CONNEXION
    Route::get('/admin-connexion', [AdminLoginController::class, 'index'])->name('admin_login')->middleware('guest');
    Route::post('/admin-connexion', [AdminLoginController::class, 'store'])->name('admin_login.store')->middleware('guest');

    // DASHBOARD
    Route::get('/admin-dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard')->middleware('auth');
    Route::post('/admin-dashboard', [AdminDashboardController::class, 'store'])->name('admin.dashboard')->middleware('auth');

    // BILLETTERIE
    Route::get('/admin-billetterie', [BilletterieController::class, 'index'])->name('admin.billetterie')->middleware('auth');
    Route::post('/admin-billetterie', [BilletterieController::class, 'store'])->name('admin.billetterie.store')->middleware('auth');

    Route::get('/admin-billetterie/{id}', [BilletterieController::class, 'edit'])->name('admin.billetterie.edit')->middleware('auth');
    Route::post('/admin-billetterie/{id}', [BilletterieController::class, 'update'])->name('admin.billetterie.update')->middleware('auth');
    Route::delete('/admin-billetterie/{id}', [BilletterieController::class, 'destroy'])->name('admin.billetterie.destroy')->middleware('auth');

    // VALIDATION UTILISATEUR
    Route::get('/admin-utilisateur', [UtilisateurController::class, 'index'])->name('admin.utilisateur')->middleware('auth');
    Route::post('/admin-billetterie/valid/{id}', [UtilisateurController::class, 'valid'])->name('admin.utilisateur.valid')->middleware('auth');
    Route::post('/admin-billetterie/invalid/{user}', [UtilisateurController::class, 'invalid'])->name('admin.utilisateur.invalid')->middleware('auth');

    // SEER INFOS
    Route::get('/seer-infos', [SeerInfosController::class, 'index'])->name('seer.index')->middleware('auth');
    Route::post('/seer-infos', [SeerInfosController::class, 'create'])->name('create_infos')->middleware('auth');

    // DECONNEXION
    Route::get('/admin-deconnexion', [AdminLogoutController::class, 'destroy'])->name('admin.logout')->middleware('auth');
