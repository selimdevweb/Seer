<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;


/* OTHER */
use App\Http\Controllers\Other\HomeController;
use App\Http\Controllers\User\PanierController;
use App\Http\Controllers\User\ProfilController;

/* USER */
use App\Http\Controllers\Other\ConnexionController;
use App\Http\Controllers\User\InscriptionController;
use App\Http\Controllers\Admin\BilletterieController;

/* ADMIN */
use App\Http\Controllers\Other\DeconnexionController;
use App\Http\Controllers\Admin\TableauDeBordController;
use App\Http\Controllers\Admin\GestionDesMembresController;
use App\Http\Controllers\Admin\InformationsBilletterieController;

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

/* OTHER */

    // ACCUEIL
    Route::get('/', [HomeController::class, 'index'])->name('other.index');

    Route::get('/a-propos', function(){
        return view('other.a-propos');
    })->name('other.a-propos');

    Route::get('/team', function(){
        return view('other.team');
    })->name('other.team');

    // CONNEXION
    Route::get('/connexion', [ConnexionController::class, 'index'])->name('other.connexion.index')->middleware('guest');
    Route::post('/connexion', [ConnexionController::class, 'store'])->name('other.connexion.store')->middleware('guest');

    // DECONNEXION
    Route::get('/deconnexion', [DeconnexionController::class, 'destroy'])->name('other.deconnexion.destroy')->middleware('auth');

/* USER */

    // INSCRIPTION
    Route::get('/inscription', [InscriptionController::class, 'index'])->name('user.inscription.index')->middleware('guest');
    Route::post('/inscription', [InscriptionController::class, 'store'])->name('user.inscription.store')->middleware('guest');

    // MOT DE PASSE OUBLIE
    Route::get('/mot-de-passe-oublie', [ForgotPasswordController::class, 'getEmail'])->name('index.password');
    Route::post('/mot-de-passe-oublie', [ForgotPasswordController::class, 'postEmail'])->name('store.password');

    Route::get('/nouveau-mot-de-passe/{token}', [ResetPasswordController::class, 'getPassword'])->name('index.reset');
    Route::post('/nouveau-mot-de-passe', [ResetPasswordController::class, 'updatePassword'])->name('store.reset');

    // PROFIL
    Route::get('/profil', [ProfilController::class, 'index'])->name('user.profil.index')->middleware('auth');
    Route::post('/profil', [ProfilController::class, 'create'])->name('user.profil.create')->middleware('auth');

    // PANIER
    Route::get('/ajout-panier/{billetterie}', [PanierController::class, 'add'])->name('user.panier.add')->middleware('auth');
    Route::get('/panier', [PanierController::class, 'index'])->name('user.panier.index')->middleware('auth');
    Route::get('/panier/update/{id}', [PanierController::class, 'update'])->name('user.panier.update')->middleware('auth');
    Route::get('/panier/supprimer/{id}', [PanierController::class, 'destroy'])->name('user.panier.destroy')->middleware('auth');

    // PAIEMENT
    Route::get('/paiement/{token}', [CheckoutController::class, 'index'])->name('user.paiement.index')->middleware('auth');
    Route::post('/paiement/{id}', [CheckoutController::class, 'makePayment'])->name('make-payment')->middleware('auth');

/* ADMIN */

    // TABLEAU DE BORD
    Route::get('/tableau-de-bord', [TableauDeBordController::class, 'index'])->name('admin.tableau-de-bord.index')->middleware('auth');
    Route::post('/tableau-de-bord', [TableauDeBordController::class, 'store'])->name('admin.tableau-de-bord.store')->middleware('auth');

    // BILLETTERIE
    Route::get('/billetterie', [BilletterieController::class, 'index'])->name('admin.billetterie.index')->middleware('auth');
    Route::post('/billetterie', [BilletterieController::class, 'store'])->name('admin.billetterie.store')->middleware('auth');

    Route::get('/billetterie/{id}', [BilletterieController::class, 'edit'])->name('admin.billetterie.edit')->middleware('auth');
    Route::post('/billetterie/{id}', [BilletterieController::class, 'update'])->name('admin.billetterie.update')->middleware('auth');
    Route::delete('/billetterie/{id}', [BilletterieController::class, 'destroy'])->name('admin.billetterie.destroy')->middleware('auth');

    // GESTION DES MEMBRES
    Route::get('/gestion-des-membres', [GestionDesMembresController::class, 'index'])->name('admin.gestion-des-membres.index')->middleware('auth');
    Route::post('/gestion-des-membres/valid/{id}', [GestionDesMembresController::class, 'valid'])->name('admin.gestion-des-membres.valid')->middleware('auth');
    Route::post('/gestion-des-membres/invalid/{user}', [GestionDesMembresController::class, 'invalid'])->name('admin.gestion-des-membres.invalid')->middleware('auth');

    // INFORMATION BILLETTERIE
    Route::get('/informations-billetterie', [InformationsBilletterieController::class, 'index'])->name('admin.informations-billetterie.index')->middleware('auth');
    Route::post('/informations-billetterie', [InformationsBilletterieController::class, 'create'])->name('admin.informations-billetterie.create')->middleware('auth');
    Route::post('/informations-billetterie{id}', [InformationsBilletterieController::class, 'update'])->name('admin.informations-billetterie.update')->middleware('auth');
