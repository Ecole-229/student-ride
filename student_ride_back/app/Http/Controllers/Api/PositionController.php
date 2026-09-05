<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Trajet;
use App\Models\Position;
use App\Events\PositionMiseAJour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PositionController extends Controller
{
    public function store(Request $request, Trajet $trajet)
    {
        $this->authorize('update', $trajet);

        if ($trajet->statut !== 'en_cours') {
            return response()->json(['message' => 'Le trajet n\'est pas en cours'], 422);
        }

        $validated = $request->validate([
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
        ]);

        $position = $trajet->positions()->create([
            'latitude' => $validated['latitude'],
            'longitude' => $validated['longitude'],
            'horodatage' => now(),
        ]);

        broadcast(new PositionMiseAJour($position))->toOthers();

        return response()->json([
            'message' => 'Position enregistrée avec succès.',
            'data' => $position
        ], 201);
    }

    public function dernierePosition(Trajet $trajet)
    {
        $user = Auth::user();
        $estConducteur = $trajet->conducteur->user_id === $user->id;
        $aReserve = $trajet->reservations()
            ->whereHas('passager', fn ($q) => $q->where('user_id', $user->id))
            ->where('statut', 'confirmee')
            ->exists();

        if (!$estConducteur && !$aReserve) {
            return response()->json(['message' => 'Non autorisé'], 403);
        }

        $position = $trajet->positions()->latest('horodatage')->first();

        return response()->json([
            'message' => 'Dernière position récupérée avec succès.',
            'data' => $position
        ], 200);
    }
}
