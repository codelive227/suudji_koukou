@extends('layouts.app')

@section('title', 'Accueil')

@section('content')

<!-- HERO -->
<section class="bg-success text-white py-5 mt-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <h1 class="fw-bold display-6">Hadj & Omra</h1>
                <h4 class="text-warning fw-semibold mt-2">Un accompagnement spirituel, humain et sécurisé</h4>
                <p class="mt-4 fs-5">
                    Agence agréée spécialisée dans l’organisation du Hadj et de la Omra,
                    nous offrons un accompagnement complet : démarches administratives,
                    encadrement religieux, hébergement, transport et assistance permanente,
                    afin de garantir un pèlerinage accompli dans la dignité, la sérénité
                    et le strict respect des rites islamiques.
                </p>
                <div class="mt-4">
                    <a href="#contact" class="btn btn-warning text-white fw-semibold rounded-pill px-4 me-3">
                        Nous contacter
                    </a>
                    <a href="#services" class="btn btn-outline-warning fw-semibold rounded-pill px-4">
                        Nos services
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SERVICES -->
<section id="services" class="py-5">
    <div class="container">
        <div class="text-center mb-4">
            <h2 class="fw-bold text-warning">Nos Services</h2>
            <p class="text-secondary">Un accompagnement complet et maîtrisé</p>
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

<!-- CONTACT -->
<section id="contact" class="bg-success text-white py-4 text-center">
    <div class="container">
        <h2 class="fw-bold text-warning">Contact</h2>
        <p class="opacity-75 mt-2">Notre équipe est à votre écoute</p>
        <div class="mt-3 fw-semibold">
            <p>📞 (+227) 98 55 30 94 / 97 00 33 44</p>
            <p>📧 contact@suudjkoukou.com</p>
        </div>
    </div>
</section>

@endsection
