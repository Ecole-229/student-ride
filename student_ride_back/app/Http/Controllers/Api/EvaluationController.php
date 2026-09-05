<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Trajet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EvaluationController extends Controller
{
    public function store(Request $request, Trajet $trajet)
    {
        $passager = Auth::user()->passager;

        if (!$passager) {
            return response()->json(['message' => 'Seul un passager peut évaluer'], 403);
        }

        if ($trajet->statut !== 'termine') {
            return response()->json(['message' => 'Le trajet doit être terminé pour être évalué'], 422);
        }

        $aVoyage = $trajet->reservations()
            ->where('passager_id', $passager->id)
            ->where('statut', 'confirmee')
            ->exists();

        if (!$aVoyage) {
            return response()->json(['message' => 'Vous n\'avez pas voyagé sur ce trajet'], 403);
        }

        $dejaEvalue = $trajet->evaluations()->where('passager_id', $passager->id)->exists();

        if ($dejaEvalue) {
            return response()->json(['message' => 'Vous avez déjà évalué ce trajet'], 422);
        }

        $validated = $request->validate([
            'note' => 'required|integer|between:1,5',
            'commentaire' => 'nullable|string|max:1000',
        ]);

        $evaluation = $trajet->evaluations()->create([
            ...$validated,
            'passager_id' => $passager->id,
            'conducteur_id' => $trajet->conducteur_id,
        ]);

        return response()->json(["message" => "Évaluation enregistrée avec succès.", "data" => $evaluation], 201);
    }
}
