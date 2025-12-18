<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| Routes Publiques
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/services', function () {
    return view('services');
})->name('services');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');


/* Envoi formulaire */
Route::post('/contact', [ContactController::class, 'send'])
    ->name('contact.send');

/*
|--------------------------------------------------------------------------
| Routes Protégées (Authentification requise)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard principal
    Route::view('dashboard', 'dashboard')->name('dashboard');

    // --- APPLICATION SUUDJ KOUKOU (GESTION UNIQUE) ---
    // Cette route charge votre composant pelerins-manager.blade.php
    Volt::route('gestion', 'pelerins-manager')->name('gestion');

    // --- PARAMÈTRES UTILISATEUR ---
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('user-password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');

    // Authentification à deux facteurs
    Volt::route('settings/two-factor', 'settings.two-factor')
        ->middleware(
            collect([
                Features::canManageTwoFactorAuthentication() && 
                Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword') 
                ? 'password.confirm' : null
            ])->filter()->toArray()
        )
        ->name('two-factor.show');
});
