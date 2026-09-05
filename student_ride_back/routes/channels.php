<?php

use Illuminate\Support\Facades\Broadcast;
use App\Models\Trajet;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Ici on définit qui a le droit d'écouter quel canal privé.
| Laravel appelle automatiquement cette fonction quand un utilisateur
| authentifié tente de s'abonner au canal "trajet.{trajetId}" via Echo.
|
*/

Broadcast::channel('trajet.{trajetId}', function ($user, $trajetId) {
    $trajet = Trajet::find($trajetId);

    if (!$trajet) {
        return false;
    }

    // Le conducteur du trajet a le droit d'écouter
    $estConducteur = $trajet->conducteur->user_id === $user->id;

    // Un passager ayant une réservation confirmée sur ce trajet a le droit d'écouter
    $aReserve = $trajet->reservations()
        ->whereHas('passager', fn ($q) => $q->where('user_id', $user->id))
        ->where('statut', 'confirmee')
        ->exists();

    return $estConducteur || $aReserve;
});
