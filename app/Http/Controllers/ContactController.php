<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'nom' => 'required|min:3',
            'telephone' => 'required|min:8',
            'email' => 'required|email',
            'message' => 'required|min:10',
        ]);

        // Pour l’instant : on ne fait qu’un message de succès
        // (plus tard : email ou base de données)

        return back()->with('success', 'Votre message a bien été envoyé. Nous vous contacterons rapidement.');
    }
}
