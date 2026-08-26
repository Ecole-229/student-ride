<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $fillable = ['trajet_id', 'passager_id', 'conducteur_id', 'note', 'commentaire'];

    public function trajet()
    {
        return $this->belongsTo(Trajet::class);
    }

    public function passager()
    {
        return $this->belongsTo(Passager::class);
    }

    public function conducteur()
    {
        return $this->belongsTo(Conducteur::class);
    }
}
