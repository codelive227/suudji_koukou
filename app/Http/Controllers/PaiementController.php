<?php

namespace App\Http\Controllers;

use App\Models\Paiement;
use App\Models\Pelerin;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;

class PaiementController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'pelerin_id' => 'required|exists:pelerins,id',
            'montant' => 'required|numeric|min:1',
            'mode_paiement' => 'required',
        ]);

        $paiement = Paiement::create([
            'pelerin_id' => $request->pelerin_id,
            'montant' => $request->montant,
            'mode_paiement' => $request->mode_paiement,
            'reference_recu' => 'REC-' . strtoupper(Str::random(8)),
            'valide_par_agent_id' => auth()->id(), // L'admin connecté
        ]);

        return redirect()->back()->with('success', 'Paiement enregistré.');
    }

    public function downloadFacture(Paiement $paiement)
    {
        $pelerin = $paiement->pelerin;
        $totalPaye = $pelerin->paiements()->sum('montant');
        $solde = $pelerin->voyage->prix_total - $totalPaye;

        $pdf = Pdf::loadView('pdf.facture', [
            'paiement' => $paiement,
            'pelerin' => $pelerin,
            'solde' => $solde,
            'date' => now()->format('d/m/Y')
        ]);

        return $pdf->download("Facture_{$paiement->reference_recu}.pdf");
    }
}
