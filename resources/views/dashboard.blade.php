@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<h1 class="mb-4">Bienvenue sur votre Dashboard</h1>

<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="card text-center shadow-sm p-3">
            <h5>Pèlerins</h5>
            <p class="fs-3 fw-bold">{{ \App\Models\Pelerin::count() }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-center shadow-sm p-3">
            <h5>Voyages</h5>
            <p class="fs-3 fw-bold">{{ \App\Models\Voyage::count() }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-center shadow-sm p-3">
            <h5>Paiements</h5>
            <p class="fs-3 fw-bold">{{ \App\Models\Paiement::count() }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-center shadow-sm p-3">
            <h5>Utilisateurs</h5>
            <p class="fs-3 fw-bold">{{ \App\Models\User::count() }}</p>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-6">
        <div class="card shadow-sm p-3">
            <h5>Voyages à venir</h5>
            <ul class="list-group list-group-flush">
                @foreach(\App\Models\Voyage::orderBy('date_depart', 'asc')->take(5)->get() as $voyage)
                    <li class="list-group-item d-flex justify-content-between">
                        {{ $voyage->nom_voyage }} ({{ $voyage->type_voyage }})
                        <span>{{ $voyage->date_depart->format('d/m/Y') }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card shadow-sm p-3">
            <h5>Derniers paiements</h5>
            <ul class="list-group list-group-flush">
                @foreach(\App\Models\Paiement::latest()->take(5)->get() as $paiement)
                    <li class="list-group-item d-flex justify-content-between">
                        {{ $paiement->pelerin->nom }} {{ $paiement->pelerin->prenom }}
                        <span>{{ number_format($paiement->montant, 2) }} CFA</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
 