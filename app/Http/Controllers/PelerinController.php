<?php

namespace App\Http\Controllers;

use App\Models\Pelerin;
use Illuminate\Http\Request;

class PelerinController extends Controller
{
    public function index()
    {
        $pelerins = Pelerin::latest()->paginate(10);
        return view('pelerins.index', compact('pelerins'));
    }

    public function create()
    {
        return view('pelerins.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'tel' => 'required|string|max:20',
            'email' => 'required|email|unique:pelerins,email',
            'numero_passport' => 'required|string|unique:pelerins,numero_passport',
            'date_emission' => 'required|date',
            'date_expire' => 'required|date|after_or_equal:date_emission',
            'statut_visa' => 'required|string',
            'statut_dossier' => 'required|string',
        ]);

        Pelerin::create($validated);

        return redirect()->route('pelerins.index')
                         ->with('success', 'Pèlerin ajouté avec succès.');
    }

    public function show(Pelerin $pelerin)
    {
        return view('pelerins.show', compact('pelerin'));
    }

    public function edit(Pelerin $pelerin)
    {
        return view('pelerins.edit', compact('pelerin'));
    }

    public function update(Request $request, Pelerin $pelerin)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'tel' => 'required|string|max:20',
            'email' => 'required|email|unique:pelerins,email,' . $pelerin->id,
            'numero_passport' => 'required|string|unique:pelerins,numero_passport,' . $pelerin->id,
            'date_emission' => 'required|date',
            'date_expire' => 'required|date|after_or_equal:date_emission',
            'statut_visa' => 'required|string',
            'statut_dossier' => 'required|string',
        ]);

        $pelerin->update($validated);

        return redirect()->route('pelerins.index')
                         ->with('success', 'Pèlerin mis à jour avec succès.');
    }

    public function destroy(Pelerin $pelerin)
    {
        $pelerin->delete();
        return redirect()->route('pelerins.index')
                         ->with('success', 'Pèlerin supprimé avec succès.');
    }
}
