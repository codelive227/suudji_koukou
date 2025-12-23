@extends('layouts.app')

@section('title', 'Liste des Pèlerins')

@section('content')

<div class="container-fluid">

    {{-- Titre + Bouton --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="mb-0">Liste des Pèlerins</h1>

        <a href="{{ route('pelerins.create') }}" class="btn btn-success">
            <i class="bi bi-plus-circle me-1"></i>
            Ajouter un pèlerin
        </a>
    </div>

    {{-- Filtres --}}
    <div class="row mb-3">
        <div class="col-md-4">
            <input type="text"
                   class="form-control"
                   placeholder="Recherche..."
                   wire:model.debounce.500ms="search">
        </div>

        <div class="col-md-3">
            <select class="form-select" wire:model="statutVisa">
                <option value="">Statut Visa</option>
                <option value="Validé">Validé</option>
                <option value="En attente">En attente</option>
                <option value="Refusé">Refusé</option>
            </select>
        </div>

        <div class="col-md-3">
            <select class="form-select" wire:model="statutDossier">
                <option value="">Statut Dossier</option>
                <option value="Complet">Complet</option>
                <option value="En cours">En cours</option>
                <option value="Incomplet">Incomplet</option>
            </select>
        </div>
    </div>

    {{-- Table --}}
    <div class="table-responsive bg-white shadow-sm rounded">
        <table class="table table-bordered table-hover mb-0">
            <thead class="table-success">
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Date de naissance</th>
                    <th>Téléphone</th>
                    <th>Email</th>
                    <th>Passeport</th>
                    <th>Visa</th>
                    <th>Dossier</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse($pelerins as $pelerin)
                    <tr>
                        <td>{{ $pelerin->nom }}</td>
                        <td>{{ $pelerin->prenom }}</td>
                        <td>{{ $pelerin->date_naissance}}</td>
                        <td>{{ $pelerin->tel }}</td>
                        <td>{{ $pelerin->email }}</td>
                        <td>{{ $pelerin->numero_passport }}</td>

                        {{-- Badges Visa --}}
                        <td>
                            <span class="badge 
                                {{ $pelerin->statut_visa == 'Validé' ? 'bg-success' : 
                                   ($pelerin->statut_visa == 'En attente' ? 'bg-warning text-dark' : 'bg-danger') }}">
                                {{ $pelerin->statut_visa }}
                            </span>
                        </td>

                        {{-- Badges Dossier --}}
                        <td>
                            <span class="badge 
                                {{ $pelerin->statut_dossier == 'Complet' ? 'bg-success' :
                                   ($pelerin->statut_dossier == 'En cours' ? 'bg-warning text-dark' : 'bg-danger') }}">
                                {{ $pelerin->statut_dossier }}
                            </span>
                        </td>

                        {{-- Actions --}}
                        <td class="text-center">
                            <a href="{{ route('pelerins.show', $pelerin) }}"
                               class="btn btn-sm btn-outline-primary me-1"
                               title="Voir">
                                <i class="bi bi-eye"></i>
                            </a>

                            <a href="{{ route('pelerins.edit', $pelerin) }}"
                               class="btn btn-sm btn-outline-warning me-1"
                               title="Modifier">
                                <i class="bi bi-pencil"></i>
                            </a>

                            <form action="{{ route('pelerins.destroy', $pelerin) }}"
                                  method="POST"
                                  class="d-inline"
                                  onsubmit="return confirm('Supprimer ce pèlerin ?')">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-sm btn-outline-danger"
                                        title="Supprimer">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">
                            Aucun pèlerin trouvé
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-3">
        {{ $pelerins->links('pagination::bootstrap-5') }}
    </div>

</div>

@endsection
