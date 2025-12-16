<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voyage extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'nom_voyage',
        'date_depart',
        'date_retour',
        'prix_total',
        'places_totales',
        'places_restantes',
    ];

    public function pelerin(){
         return $this->hasMany(Pelerin::class, 'voyage_actuel_id');
    }
}
