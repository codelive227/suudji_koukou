@extends('layouts.app')

@section('title', 'Détails Pèlerin')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">

            <div class="card shadow-lg border-success">
                {{-- Header --}}
                <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
                    <h3 class="mb-0"><i class="bi bi-person-lines-fill me-2"></i>Détails Pèlerin</h3>
                    <a href="{{ route('pelerins.index') }}" class="btn btn-light btn-sm text-success">
                        <i class="bi bi-arrow-left me-1"></i> Retour
                    </a>
                </div>

                {{-- Body --}}
                <div class="card-body">

                    <div class="row mb-3">
                        <div class="col-md-6 mb-2">
                            <i class="bi bi-person-fill text-success me-2"></i>
                            <strong>Nom :</strong> {{ $pelerin->nom }}
                        </div>
                        <div class="col-md-6 mb-2">
                            <i class="bi bi-person-fill text-success me-2"></i>
                            <strong>Prénom :</strong> {{ $pelerin->prenom }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6 mb-2">
                            <i class="bi bi-calendar-date-fill text-warning me-2"></i>
                            <strong>Date de naissance :</strong> {{ $pelerin->date_naissance }}
                        </div>
                        <div class="col-md-6 mb-2">
                            <i class="bi bi-telephone-fill text-primary me-2"></i>
                            <strong>Téléphone :</strong> {{ $pelerin->tel }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6 mb-2">
                            <i class="bi bi-envelope-fill text-danger me-2"></i>
                            <strong>Email :</strong> {{ $pelerin->email }}
                        </div>
                        <div class="col-md-6 mb-2">
                            <i class="bi bi-passport-fill text-secondary me-2"></i>
                            <strong>Passeport :</strong> {{ $pelerin->numero_passport }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6 mb-2">
                            <i class="bi bi-calendar-check-fill text-info me-2"></i>
                            <strong>Date d'émission :</strong> {{ $pelerin->date_emission }}
                        </div>
                        <div class="col-md-6 mb-2">
                            <i class="bi bi-calendar-x-fill text-danger me-2"></i>
                            <strong>Date d'expiration :</strong> {{ $pelerin->date_expire }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6 mb-2">
                            <i class="bi bi-check2-circle text-success me-2"></i>
                            <strong>Statut Visa :</strong>
                            @if($pelerin->statut_visa == 'Validé')
                                <span class="badge bg-success">{{ $pelerin->statut_visa }}</span>
                            @elseif($pelerin->statut_visa == 'Refusé')
                                <span class="badge bg-danger">{{ $pelerin->statut_visa }}</span>
                            @else
                                <span class="badge bg-warning text-dark">{{ $pelerin->statut_visa }}</span>
                            @endif
                        </div>
                        <div class="col-md-6 mb-2">
                            <i class="bi bi-folder-check-fill text-primary me-2"></i>
                            <strong>Statut Dossier :</strong>
                            @if($pelerin->statut_dossier == 'complet')
                                <span class="badge bg-success">{{ $pelerin->statut_dossier }}</span>
                            @elseif($pelerin->statut_dossier == 'en cours')
                                <span class="badge bg-info text-dark">{{ $pelerin->statut_dossier }}</span>
                            @else
                                <span class="badge bg-secondary">{{ $pelerin->statut_dossier }}</span>
                            @endif
                        </div>
                    </div>

                    {{-- Boutons --}}
                    <div class="d-flex justify-content-end mt-4">
                        <a href="{{ route('pelerins.edit', $pelerin) }}" class="btn btn-success me-2">
                            <i class="bi bi-pencil-square me-1"></i> Modifier
                        </a>
                        <a href="{{ route('pelerins.index') }}" class="btn btn-light text-success">
                            <i class="bi bi-arrow-left me-1"></i> Retour
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
