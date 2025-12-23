@extends('layouts.app')

@section('title', isset($pelerin) ? 'Modifier Pèlerin' : 'Ajouter Pèlerin')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">

            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">
                    <h3 class="mb-0">{{ isset($pelerin) ? 'Modifier Pèlerin' : 'Ajouter Pèlerin' }}</h3>
                </div>
                <div class="card-body">

                    <form action="{{ isset($pelerin) ? route('pelerins.update', $pelerin) : route('pelerins.store') }}" method="POST">
                        @csrf
                        @if(isset($pelerin))
                            @method('PUT')
                        @endif

                        {{-- Nom et Prénom --}}
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Nom</label>
                                <input type="text" name="nom" class="form-control" value="{{ old('nom', $pelerin->nom ?? '') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Prénom</label>
                                <input type="text" name="prenom" class="form-control" value="{{ old('prenom', $pelerin->prenom ?? '') }}" required>
                            </div>
                        </div>

                        {{-- Date de naissance et Téléphone --}}
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Date de naissance</label>
                                <input type="date" name="date_naissance" class="form-control" value="{{ old('date_naissance', $pelerin->date_naissance ?? '') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Téléphone</label>
                                <input type="text" name="tel" class="form-control" value="{{ old('tel', $pelerin->tel ?? '') }}" required>
                            </div>
                        </div>

                        {{-- Email --}}
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email', $pelerin->email ?? '') }}" required>
                        </div>

                        {{-- Passeport --}}
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Numéro Passeport</label>
                                <input type="text" name="numero_passport" class="form-control" value="{{ old('numero_passport', $pelerin->numero_passport ?? '') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Date d'émission</label>
                                <input type="date" name="date_emission" class="form-control" value="{{ old('date_emission', $pelerin->date_emission ?? '') }}" required>
                            </div>
                        </div>

                        {{-- Date expiration --}}
                        <div class="mb-3">
                            <label class="form-label">Date d'expiration</label>
                            <input type="date" name="date_expire" class="form-control" value="{{ old('date_expire', $pelerin->date_expire ?? '') }}" required>
                        </div>

                        {{-- Statuts --}}
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Statut Visa</label>
                                <select name="statut_visa" class="form-select" required>
                                    <option value="En attente" {{ (old('statut_visa', $pelerin->statut_visa ?? '') == 'En attente') ? 'selected' : '' }}>En attente</option>
                                    <option value="Validé" {{ (old('statut_visa', $pelerin->statut_visa ?? '') == 'Validé') ? 'selected' : '' }}>Validé</option>
                                    <option value="Refusé" {{ (old('statut_visa', $pelerin->statut_visa ?? '') == 'Refusé') ? 'selected' : '' }}>Refusé</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Statut Dossier</label>
                                <select name="statut_dossier" class="form-select" required>
                                    <option value="incomplet" {{ (old('statut_dossier', $pelerin->statut_dossier ?? '') == 'incomplet') ? 'selected' : '' }}>Incomplet</option>
                                    <option value="en cours" {{ (old('statut_dossier', $pelerin->statut_dossier ?? '') == 'en cours') ? 'selected' : '' }}>En cours</option>
                                    <option value="complet" {{ (old('statut_dossier', $pelerin->statut_dossier ?? '') == 'complet') ? 'selected' : '' }}>Complet</option>
                                </select>
                            </div>
                        </div>

                        {{-- Bouton --}}
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-success btn-lg">
                                {{ isset($pelerin) ? 'Mettre à jour' : 'Ajouter' }}
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
