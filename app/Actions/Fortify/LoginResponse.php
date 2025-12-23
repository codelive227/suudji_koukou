<?php

namespace App\Actions\Fortify;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    /**
     * Redirige l'utilisateur après connexion.
     */
    public function toResponse($request)
    {
        return redirect()->route('dashboard'); // ← ici ton dashboard
    }
}
