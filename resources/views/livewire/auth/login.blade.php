@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="d-flex justify-content-center align-items-center min-vh-100 bg-light">
    <div class="card shadow-lg p-4" style="max-width: 400px; width: 100%; border-radius: 15px;">
        
        {{-- Logo et nom de l'agence --}}
        <div class="text-center mb-4">
            <img src="{{ asset('images/suudji.jpg') }}" alt="Logo Suudj Kouku" height="60" class="mb-2">
            <h3 class="fw-bold text-success">SUUDJ KOUKU</h3>
        </div>

        <h4 class="card-title text-center mb-3">Se connecter</h4>
        <p class="text-center text-muted mb-4">Entrez vos identifiants pour accéder à votre compte</p>

        {{-- Formulaire --}}
        <form method="POST" action="{{ route('login.store') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Adresse Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="exemple@suudjkouku.com" required autofocus>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="••••••••" required>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label" for="remember">Se souvenir de moi</label>
            </div>

            <button type="submit" class="btn btn-success w-100 fw-bold">Se connecter</button>
        </form>

        @if (Route::has('register'))
            <p class="text-center mt-3 text-muted">
                Pas de compte ? <a href="{{ route('register') }}" class="text-success fw-semibold">S’inscrire</a>
            </p>
        @endif

    </div>
</div>

{{-- Optionnel: ajouter un style subtil pour fond --}}
<style>
    body {
        background: linear-gradient(to bottom right, #e6f2e6, #ffffff);
    }

    .card {
        border: none;
    }

    .form-control:focus {
        box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
        border-color: #28a745;
    }

    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
    }

    .btn-success:hover {
        background-color: #218838;
        border-color: #1e7e34;
    }
</style>
@endsection
