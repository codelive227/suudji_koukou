@extends('layouts.app')

@section('no-sidebar', true)
@section('title', 'Contact')

@section('content')
<section class="py-5 mt-5">
    <div class="container">
        <!-- Titre -->
        <div class="text-center mb-4">
            <h2 class="fw-bold text-warning">Contact</h2>
            <p class="text-secondary">Notre équipe est à votre écoute</p>
        </div>

        <!-- Infos contact -->
        <div class="row g-4 mb-4 text-center">
            <div class="col-md-4">
                <div class="card h-100 shadow-sm p-4 border-0">
                    <div class="fs-1 text-success mb-2">📞</div>
                    <h5 class="fw-bold">Téléphone</h5>
                    <p class="text-secondary mb-0">
                        (+227) 98 55 30 94<br>
                        (+227) 97 00 33 44
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 shadow-sm p-4 border-0">
                    <div class="fs-1 text-success mb-2">📧</div>
                    <h5 class="fw-bold">Email</h5>
                    <p class="text-secondary mb-0">
                        contact@suudjkoukou.com
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 shadow-sm p-4 border-0">
                    <div class="fs-1 text-success mb-2">📍</div>
                    <h5 class="fw-bold">Adresse</h5>
                    <p class="text-secondary mb-0">
                        Niamey – Niger
                    </p>
                </div>
            </div>
        </div>

        <!-- Formulaire -->
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm p-4 border-0">
                    <h5 class="fw-bold text-center mb-3">Envoyez-nous un message</h5>

                    <form method="POST" action="{{ route('contact.send') }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nom complet</label>
                            <input type="text" name="nom"
                                class="form-control"
                                value="{{ old('nom') }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Téléphone</label>
                            <input type="text" name="telephone"
                                class="form-control"
                                value="{{ old('telephone') }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Email</label>
                            <input type="email" name="email"
                                class="form-control"
                                value="{{ old('email') }}">
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Message</label>
                            <textarea name="message"
                                class="form-control"
                                rows="4">{{ old('message') }}</textarea>
                        </div>

                        <button class="btn btn-success w-100 fw-semibold rounded-pill">
                            Envoyer
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection
