<?php

namespace App\Http\Controllers;

use App\Models\Voyage;
use Illuminate\Http\Request;

class VoyageController extends Controller
{
    public function index()
    {
        $voyages = Voyage::withCount('pelerins')->latest()->get();
        return view('voyages.index', compact('voyages'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nom_voyage' => 'required',
            'date_depart' => 'required|date',
            'prix_total' => 'required|numeric',
            'places_totales' => 'required|integer',
            'type_voyage' => 'required|in:Oumra,Hajj',
        ]);

        $data['places_restantes'] = $request->places_totales;
        Voyage::create($data);

        return redirect()->route('voyages.index')->with('success', 'Voyage créé.');
    }
}
