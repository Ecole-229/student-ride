<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trajet extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'conducteur_id', 'vehicule_id', 'ville_depart', 'ville_destination',
        'date_heure_depart', 'places_disponibles', 'statut', 'prix',
    ];

    public function conducteur()
    {
        return $this->belongsTo(Conducteur::class);
    }

    public function vehicule()
    {
        return $this->belongsTo(Vehicule::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function positions()
    {
        return $this->hasMany(Position::class);
    }

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }

}
