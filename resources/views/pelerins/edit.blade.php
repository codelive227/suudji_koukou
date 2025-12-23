@extends('layouts.app')

@section('title', 'Modifier Pèlerin')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            
            <div class="card shadow-sm border-success">
                <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Modifier Pèlerin</h3>
                    <a href="{{ route('pelerins.index') }}" class="btn btn-light btn-sm text-success">
                        <i class="bi bi-arrow-left me-1"></i> Retour
                    </a>
                </div>
                <div class="card-body">

                    {{-- Formulaire réutilisé --}}
                    <form action="{{ route('pelerins.update', $pelerin) }}" method="POST">
                        @csrf
                        @method('PUT')

                        {{-- Nom et Prénom --}}
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Nom</label>
                                <input type="text" name="nom" class="form-control" value="{{ old('nom', $pelerin->nom) }}" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Prénom</label>
                                <input type="text" name="prenom" class="form-control" value="{{ old('prenom', $pelerin->prenom) }}" required>
                            </div>
                        </div>

                        {{-- Date de naissance et Téléphone --}}
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Date de naissance</label>
                                <input type="date" name="date_naissance" class="form-control" value="{{ old('date_naissance', $pelerin->date_naissance) }}" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Téléphone</label>
                                <input type="text" name="tel" class="form-control" value="{{ old('tel', $pelerin->tel) }}" required>
                            </div>
                        </div>

                        {{-- Email --}}
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email', $pelerin->email) }}" required>
                        </div>

                        {{-- Passeport --}}
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Numéro Passeport</label>
                                <input type="text" name="numero_passport" class="form-control" value="{{ old('numero_passport', $pelerin->numero_passport) }}" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Date d'émission</label>
                                <input type="date" name="date_emission" class="form-control" value="{{ old('date_emission', $pelerin->date_emission) }}" required>
                            </div>
                        </div>

                        {{-- Date expiration --}}
                        <div class="mb-3">
                            <label class="form-label">Date d'expiration</label>
                            <input type="date" name="date_expire" class="form-control" value="{{ old('date_expire', $pelerin->date_expire) }}" required>
                        </div>

                        {{-- Statuts --}}
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Statut Visa</label>
                                <select name="statut_visa" class="form-select" required>
                                    <option value="En attente" {{ ($pelerin->statut_visa == 'En attente') ? 'selected' : '' }}>En attente</option>
                                    <option value="Validé" {{ ($pelerin->statut_visa == 'Validé') ? 'selected' : '' }}>Validé</option>
                                    <option value="Refusé" {{ ($pelerin->statut_visa == 'Refusé') ? 'selected' : '' }}>Refusé</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Statut Dossier</label>
                                <select name="statut_dossier" class="form-select" required>
                                    <option value="incomplet" {{ ($pelerin->statut_dossier == 'incomplet') ? 'selected' : '' }}>Incomplet</option>
                                    <option value="en cours" {{ ($pelerin->statut_dossier == 'en cours') ? 'selected' : '' }}>En cours</option>
                                    <option value="complet" {{ ($pelerin->statut_dossier == 'complet') ? 'selected' : '' }}>Complet</option>
                                </select>
                            </div>
                        </div>

                        {{-- Bouton --}}
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-success btn-lg">Mettre à jour</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
