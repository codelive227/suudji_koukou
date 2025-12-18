<?php

namespace App\Http\Controllers;

use App\Models\Pelerin;
use App\Models\Voyage;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PelerinController extends Controller
{
    public function index(Request $request)
    {
        // Recherche multicritère automatique
        $pelerins = Pelerin::with('voyage')
            ->when($request->search, function ($query, $search) {
                $query->where('nom', 'like', "%{$search}%")
                      ->orWhere('prenom', 'like', "%{$search}%")
                      ->orWhere('numero_passport', 'like', "%{$search}%");
            })
            ->when($request->voyage_id, fn($q, $id) => $q->where('voyage_actuel_id', $id))
            ->latest()
            ->paginate(10);

        return view('pelerins.index', compact('pelerins'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'tel' => 'required',
            'numero_passport' => 'required|unique:pelerins',
            'voyage_actuel_id' => 'required|exists:voyages,id',
            // Ajoutez les autres champs ici
        ]);

        Pelerin::create($data);
        return redirect()->back()->with('success', 'Pèlerin inscrit avec succès.');
    }

    public function generatePdf(Pelerin $pelerin)
    {
        $pdf = Pdf::loadView('pdf.fiche-pelerin', compact('pelerin'));
        return $pdf->download("Fiche_{$pelerin->nom}.pdf");
    }
}
