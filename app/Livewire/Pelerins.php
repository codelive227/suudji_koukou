<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Pelerin;

class Pelerins extends Component
{
    use WithPagination;

    // Recherche et filtres
    public $search = '';
    public $statutVisa = '';
    public $statutDossier = '';

    // Champs pour formulaire création / édition
    public $pelerin_id;
    public $nom;
    public $prenom;
    public $date_naissance;
    public $tel;
    public $email;
    public $numero_passport;
    public $date_emission;
    public $date_expire;
    public $statut_visa = 'En attente';
    public $statut_dossier = 'incomplet';

    // Pagination Bootstrap
    public $paginationTheme = 'bootstrap';

    protected $rules = [
        'nom' => 'required|string|max:255',
        'prenom' => 'required|string|max:255',
        'date_naissance' => 'required|date',
        'tel' => 'required|string|max:20',
        'email' => 'required|email|unique:pelerins,email',
        'numero_passport' => 'required|string|unique:pelerins,numero_passport',
        'date_emission' => 'required|date',
        'date_expire' => 'required|date|after_or_equal:date_emission',
        'statut_visa' => 'required|string',
        'statut_dossier' => 'required|string',
    ];

    // Reset pagination on filter update
    public function updatingSearch() { $this->resetPage(); }
    public function updatingStatutDossier() { $this->resetPage(); }
    public function updatingStatutVisa() { $this->resetPage(); }

    // Enregistrer ou mettre à jour
    public function save()
    {
        $validated = $this->validate();

        if($this->pelerin_id) {
            // Mise à jour
            $pelerin = Pelerin::find($this->pelerin_id);
            $pelerin->update($validated);
            session()->flash('success', 'Pèlerin mis à jour avec succès.');
        } else {
            // Création
            Pelerin::create($validated);
            session()->flash('success', 'Pèlerin ajouté avec succès.');
        }

        $this->resetForm();
    }

    // Editer un pèlerin
    public function edit($id)
    {
        $pelerin = Pelerin::findOrFail($id);
        $this->pelerin_id = $pelerin->id;
        $this->nom = $pelerin->nom;
        $this->prenom = $pelerin->prenom;
        $this->date_naissance = $pelerin->date_naissance->format('Y-m-d');
        $this->tel = $pelerin->tel;
        $this->email = $pelerin->email;
        $this->numero_passport = $pelerin->numero_passport;
        $this->date_emission = $pelerin->date_emission->format('Y-m-d');
        $this->date_expire = $pelerin->date_expire->format('Y-m-d');
        $this->statut_visa = $pelerin->statut_visa;
        $this->statut_dossier = $pelerin->statut_dossier;
    }

    // Supprimer un pèlerin
    public function delete($id)
    {
        $pelerin = Pelerin::findOrFail($id);
        $pelerin->delete();
        session()->flash('success', 'Pèlerin supprimé avec succès.');
    }

    // Reset formulaire
    public function resetForm()
    {
        $this->reset(['pelerin_id','nom','prenom','date_naissance','tel','email','numero_passport','date_emission','date_expire','statut_visa','statut_dossier']);
    }

    public function render()
    {
        $pelerins = Pelerin::query()
            ->when($this->search, fn($q) => $q->where('nom','like','%'.$this->search.'%')
                                              ->orWhere('prenom','like','%'.$this->search.'%')
                                              ->orWhere('tel','like','%'.$this->search.'%')
                                              ->orWhere('email','like','%'.$this->search.'%')
                                              ->orWhere('numero_passport','like','%'.$this->search.'%'))
            ->when($this->statutVisa, fn($q) => $q->where('statut_visa', $this->statutVisa))
            ->when($this->statutDossier, fn($q) => $q->where('statut_dossier', $this->statutDossier))
            ->latest()
            ->paginate(10);

        return view('livewire.pelerins', compact('pelerins'));
    }
}
