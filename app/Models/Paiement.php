<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Pelerin;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Paiement extends Model
{
    use HasFactory;

    protected $fillable = [
        'montant',
        'mode_paiement',
        'reference_recu',
        'id_pelerin',
        'valide_par'
    ];

   public function pelerin()
    {
        return $this->belongsTo(Pelerin::class);
    }

    /**
     * Un paiement a été validé par un seul agent/utilisateur (l'admin).
     */
    public function validePar()
    {
        return $this->belongsTo(User::class, 'valide_par_agent_id');
    }
}
