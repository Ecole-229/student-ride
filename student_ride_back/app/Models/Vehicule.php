<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    protected $guarded = [];

    public function conducteur()
    {
        return $this->belongsTo(Conducteur::class);
    }

    public function trajets()
    {
        return $this->hasMany(Trajet::class);
    }
}
