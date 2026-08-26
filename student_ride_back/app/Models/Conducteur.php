<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conducteur extends Model
{
     protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vehicules()
    {
        return $this->hasMany(Vehicule::class);
    }

    public function trajets()
    {
        return $this->hasMany(Trajet::class);
    }

    public function evaluationsRecues()
    {
        return $this->hasMany(Evaluation::class);
    }
}
