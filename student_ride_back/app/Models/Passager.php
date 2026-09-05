<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Passager extends Model
{
    protected $fillable = ['user_id'];
    protected $appends = ['role'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function evaluationsRedigees()
    {
        return $this->hasMany(Evaluation::class);
    }
}
