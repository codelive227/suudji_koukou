<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelerin extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'date_naissance',
        'tel',
        'email',
        'numero_passport',
        'date_emission',
        'date_expire',
        'statut_visa',
        'statut_dossier'
    ];

    public function paiement(){
        return $this->belongsTo(Paiement::class);
    }

    public function voyage(){
        return $this->belongsTo(Voyage::class, 'voyage_actuel_id');
    }
}
