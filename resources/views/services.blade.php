@extends('layouts.app')

@section('no-sidebar', true)

@section('title', 'Nos Services')

@section('content')
<section class="py-5 mt-5">
    <div class="container">
        <div class="text-center mb-4">
            <h2 class="fw-bold text-warning">Nos Services</h2>
            <p class="text-secondary">Un accompagnement complet et maîtrisé pour votre Hadj et Omra</p>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 shadow-sm text-center p-4 border-0">
                    <div class="fs-1 text-success mb-2">🕋</div>
                    <h5 class="fw-bold">Hadj</h5>
                    <p class="text-secondary">Organisation officielle avec encadrement religieux et logistique.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 shadow-sm text-center p-4 border-0">
                    <div class="fs-1 text-success mb-2">🕌</div>
                    <h5 class="fw-bold">Omra</h5>
                    <p class="text-secondary">Programmes flexibles adaptés à chaque fidèle.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 shadow-sm text-center p-4 border-0">
                    <div class="fs-1 text-success mb-2">✈️</div>
                    <h5 class="fw-bold">Voyage</h5>
                    <p class="text-secondary">Visa, billets, hébergement et assistance continue.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
