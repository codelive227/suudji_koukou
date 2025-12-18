<?php

use App\Models\Pelerin;
use App\Models\Voyage;
use App\Models\Paiement;
use Livewire\Volt\Component;
use Livewire\WithPagination;
use Barryvdh\DomPDF\Facade\Pdf;

new class extends Component {
    use WithPagination;

    public $search = '';
    public $filtre_voyage = '';
    public $tab = 'pelerins';

    public function updatingSearch() { $this->resetPage(); }

    public function imprimerRecu($id) {
        $paiement = Paiement::with(['pelerin', 'pelerin.voyage'])->findOrFail($id);
        $pdf = Pdf::loadView('pdf.recu', [
            'paiement' => $paiement,
            'solde' => $paiement->pelerin->voyage->prix_total - $paiement->pelerin->paiements->sum('montant')
        ]);
        return response()->streamDownload(fn() => print($pdf->output()), "Recu_{$paiement->reference_recu}.pdf");
    }

    public function with() {
        return [
            'pelerins' => Pelerin::query()
                ->with(['voyage', 'paiements'])
                ->when($this->search, function($q) {
                    $q->where('nom', 'ilike', "%{$this->search}%")
                      ->orWhere('prenom', 'ilike', "%{$this->search}%")
                      ->orWhere('numero_passport', 'ilike', "%{$this->search}%");
                })
                ->when($this->filtre_voyage, fn($q) => $q->where('voyage_actuel_id', $this->filtre_voyage))
                ->latest()->paginate(10),
            'voyages' => Voyage::all(),
            'paiements' => Paiement::with('pelerin')->latest()->take(10)->get()
        ];
    }
}; ?>

<div class="min-h-screen bg-gray-100 p-8 font-sans antialiased text-gray-900">
    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="flex justify-between items-center mb-10 bg-white p-6 rounded-2xl shadow-sm border border-gray-200">
            <div>
                <h1 class="text-3xl font-black text-indigo-900 tracking-tight">SUUDJ KOUKOU</h1>
                <p class="text-gray-500 font-medium">Gestion Interne des Pèlerinages</p>
            </div>
            <nav class="flex space-x-2 bg-gray-100 p-1.5 rounded-xl">
                @foreach(['pelerins' => 'Pèlerins', 'voyages' => 'Voyages', 'paiements' => 'Paiements'] as $key => $label)
                    <button wire:click="$set('tab', '{{ $key }}')" 
                        class="px-5 py-2 rounded-lg text-sm font-bold transition-all {{ $tab == $key ? 'bg-white text-indigo-600 shadow-sm' : 'text-gray-500 hover:text-indigo-600' }}">
                        {{ $label }}
                    </button>
                @endforeach
            </nav>
        </div>

        @if($tab == 'pelerins')
            <!-- Filtres Dynamiques -->
            <div class="flex gap-4 mb-6">
                <div class="relative flex-1">
                    <input wire:model.live="search" type="text" placeholder="Recherche instantanée (Nom, Passeport...)" 
                        class="w-full pl-12 pr-4 py-3 rounded-xl border-none ring-1 ring-gray-200 focus:ring-2 focus:ring-indigo-500 shadow-sm transition-all">
                    <svg class="absolute left-4 top-3.5 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
                <select wire:model.live="filtre_voyage" class="rounded-xl border-none ring-1 ring-gray-200 focus:ring-2 focus:ring-indigo-500 shadow-sm py-3 px-6 font-medium text-gray-600">
                    <option value="">Tous les voyages</option>
                    @foreach($voyages as $v) <option value="{{ $v->id }}">{{ $v->nom_voyage }}</option> @endforeach
                </select>
            </div>

            <!-- Tableau Tailwind -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                <table class="w-full">
                    <thead class="bg-gray-50 border-b border-gray-100">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-400 uppercase tracking-widest">Pèlerin / Passeport</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-400 uppercase tracking-widest">Voyage Inscrit</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-400 uppercase tracking-widest">Solde Restant</th>
                            <th class="px-6 py-4 text-right text-xs font-bold text-gray-400 uppercase tracking-widest">Visa</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach($pelerins as $p)
                        @php $reste = ($p->voyage->prix_total ?? 0) - $p->paiements->sum('montant'); @endphp
                        <tr class="hover:bg-indigo-50/30 transition-colors group">
                            <td class="px-6 py-4">
                                <div class="font-bold text-gray-900 group-hover:text-indigo-600 transition-colors">{{ $p->nom }} {{ $p->prenom }}</div>
                                <div class="text-xs font-mono text-gray-400">{{ $p->numero_passport }}</div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600 font-medium">{{ $p->voyage->nom_voyage ?? 'N/A' }}</td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 rounded-full text-xs font-bold {{ $reste <= 0 ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                    {{ number_format($reste, 0, ',', ' ') }} FCFA
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <span class="text-xs font-bold px-2 py-1 bg-gray-100 rounded text-gray-500 italic">{{ $p->statut_visa }}</span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="p-6 border-t border-gray-50">{{ $pelerins->links() }}</div>
            </div>
        @endif

        @if($tab == 'paiements')
            <div class="grid grid-cols-1 gap-4">
                @foreach($paiements as $paiement)
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-200 flex justify-between items-center hover:border-indigo-300 transition-all">
                    <div>
                        <div class="text-xs font-bold text-indigo-500 mb-1 tracking-tighter">{{ $paiement->reference_recu }}</div>
                        <div class="font-bold text-gray-800">{{ $paiement->pelerin->nom }} {{ $paiement->pelerin->prenom }}</div>
                        <div class="text-sm text-gray-500 italic">{{ $paiement->mode_paiement }} • {{ $paiement->created_at->format('d/m/Y') }}</div>
                    </div>
                    <div class="flex items-center gap-6">
                        <div class="text-xl font-black text-gray-900">{{ number_format($paiement->montant, 0, ',', ' ') }} FCFA</div>
                        <button wire:click="imprimerRecu({{ $paiement->id }})" class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2.5 rounded-xl text-sm font-bold shadow-indigo-200 shadow-lg transition-all">
                            Imprimer PDF
                        </button>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
