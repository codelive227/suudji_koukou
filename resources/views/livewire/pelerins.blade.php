<div class="container-fluid">

    {{-- Messages flash --}}
    @if(session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Titre + Bouton --}}
    <div class="d-flex justify-content-between mb-3">
        <h1>Liste des Pèlerins</h1>
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#pelerinModal">
            <i class="bi bi-plus-circle"></i> Ajouter
        </button>
    </div>

    {{-- Filtres --}}
    <div class="row mb-3">
        <div class="col-md-4">
            <input type="text" class="form-control" placeholder="Recherche..." wire:model.debounce.500ms="search">
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
                        <td>{{ $pelerin->tel }}</td>
                        <td>{{ $pelerin->email }}</td>
                        <td>{{ $pelerin->numero_passport }}</td>
                        <td>
                            <span class="badge {{ $pelerin->statut_visa == 'Validé' ? 'bg-success' : ($pelerin->statut_visa == 'En attente' ? 'bg-warning' : 'bg-danger') }}">
                                {{ $pelerin->statut_visa }}
                            </span>
                        </td>
                        <td>
                            <span class="badge {{ $pelerin->statut_dossier == 'Complet' ? 'bg-success' : ($pelerin->statut_dossier == 'En cours' ? 'bg-warning' : 'bg-danger') }}">
                                {{ $pelerin->statut_dossier }}
                            </span>
                        </td>
                        <td class="text-center">
                            <button wire:click="edit({{ $pelerin->id }})" class="btn btn-sm btn-outline-warning">✏️</button>
                            <button wire:click="delete({{ $pelerin->id }})" class="btn btn-sm btn-outline-danger" onclick="confirm('Supprimer ce pèlerin ?') || event.stopImmediatePropagation()">🗑️</button>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="8" class="text-center">Aucun pèlerin trouvé.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-3">
        {{ $pelerins->links('pagination::bootstrap-5') }}
    </div>

    {{-- Modal Création / Edition --}}
    <div class="modal fade" id="pelerinModal" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <form wire:submit.prevent="save">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $pelerin_id ? 'Modifier Pèlerin' : 'Ajouter Pèlerin' }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-2"><input type="text" class="form-control" placeholder="Nom" wire:model="nom"></div>
                        <div class="mb-2"><input type="text" class="form-control" placeholder="Prénom" wire:model="prenom"></div>
                        <div class="mb-2"><input type="date" class="form-control" placeholder="Date Naissance" wire:model="date_naissance"></div>
                        <div class="mb-2"><input type="text" class="form-control" placeholder="Téléphone" wire:model="tel"></div>
                        <div class="mb-2"><input type="email" class="form-control" placeholder="Email" wire:model="email"></div>
                        <div class="mb-2"><input type="text" class="form-control" p
