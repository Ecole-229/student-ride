<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
     protected $fillable = ['trajet_id', 'latitude', 'longitude'];

    public function trajet()
    {
        return $this->belongsTo(Trajet::class);
    }
}
