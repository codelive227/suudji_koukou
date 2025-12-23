<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;

// Controllers
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PelerinController;
use App\Http\Controllers\VoyageController;
use App\Http\Controllers\PaiementController;

/*
|--------------------------------------------------------------------------
| ROUTES PUBLIQUES
|--------------------------------------------------------------------------
*/
Route::get('/', fn () => view('welcome'))->name('home');

Route::get('/services', fn () => view('services'))->name('services');

Route::get('/contact', fn () => view('contact'))->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

/*
|--------------------------------------------------------------------------
| ROUTES AUTHENTIFICATION (Fortify)
|--------------------------------------------------------------------------
| Login, Register, Forgot password gérés automatiquement
*/

/*
|--------------------------------------------------------------------------
| ROUTES PROTÉGÉES (AUTH + EMAIL VERIFIED)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {

    /*
    |----------------------------------
    | DASHBOARD
    |----------------------------------
    */
    Route::view('/dashboard', 'dashboard')->name('dashboard');

    /*
    |----------------------------------
    | PARAMÈTRES UTILISATEUR (Volt)
    |----------------------------------
    */
    Route::redirect('/settings', '/settings/profile');

    Volt::route('/settings/profile', 'settings.profile')
        ->name('profile.edit');

    Volt::route('/settings/password', 'settings.password')
        ->name('user-password.edit');

    Volt::route('/settings/appearance', 'settings.appearance')
        ->name('appearance.edit');

    Volt::route('/settings/two-factor', 'settings.two-factor')
        ->middleware(
            collect([
                Features::canManageTwoFactorAuthentication()
                && Features::optionEnabled(
                    Features::twoFactorAuthentication(),
                    'confirmPassword'
                )
                ? 'password.confirm'
                : null
            ])->filter()->toArray()
        )
        ->name('two-factor.show');

    /*
    |----------------------------------
    | GESTION AGENCE HADJ & OMRA
    |----------------------------------
    */

    // Pèlerins
    Route::resource('pelerins', PelerinController::class);

    // Voyages (Hadj / Omra)
    Route::resource('voyages', VoyageController::class);

    // Paiements
    Route::resource('paiements', PaiementController::class)
        ->only([
            'index',
            'store',
            'show',
            'destroy'
        ]);
});
