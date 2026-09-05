<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Trajet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrajetController extends Controller
{
     public function index(Request $request)
    {
        $query = Trajet::with(['conducteur.user', 'vehicule'])
            ->where('statut', 'planifie')
            ->where('places_disponibles', '>', 0);

        if ($request->filled('ville_depart')) {
            $query->where('ville_depart', 'like', '%' . $request->ville_depart . '%');
        }
        if ($request->filled('ville_destination')) {
            $query->where('ville_destination', 'like', '%' . $request->ville_destination . '%');
        }
        if ($request->filled('date')) {
            $query->whereDate('date_heure_depart', $request->date);
        }

        return response()->json([
            'message' => 'Liste des trajets récupérée avec succès.',
            'trajets' => $query->orderBy('date_heure_depart')->get()
        ]);
    }

    public function store(Request $request)
    {
        $conducteur = Auth::user()->conducteur;

        if (!$conducteur) {
            return response()->json(['message' => 'Seul un conducteur peut créer un trajet'], 403);
        }

        $validated = $request->validate([
            'vehicule_id' => 'required|exists:vehicules,id',
            'ville_depart' => 'required|string|max:255',
            'ville_destination' => 'required|string|max:255',
            'date_heure_depart' => 'required|date|after:now',
            'places_disponibles' => 'required|integer|min:1|max:8',
            'prix' => 'nullable|numeric|min:0',
        ]);

        if (!$conducteur->vehicules()->where('id', $validated['vehicule_id'])->exists()) {
            return response()->json(['message' => 'Ce véhicule ne vous appartient pas'], 403);
        }

        $trajet = $conducteur->trajets()->create([...$validated, 'statut' => 'planifie']);

        return response()->json($trajet, 201);
    }

    public function show(Trajet $trajet)
    {
        return response()->json($trajet->load(['conducteur.user', 'vehicule', 'reservations.passager.user']));
    }

    public function update(Request $request, Trajet $trajet)
    {
        $this->authorize('update', $trajet);

        if ($trajet->statut !== 'planifie') {
            return response()->json(['message' => 'Un trajet en cours ou terminé ne peut plus être modifié'], 422);
        }

        $validated = $request->validate([
            'ville_depart' => 'sometimes|string|max:255',
            'ville_destination' => 'sometimes|string|max:255',
            'date_heure_depart' => 'sometimes|date|after:now',
            'prix' => 'nullable|numeric|min:0',
        ]);

        $trajet->update($validated);

        return response()->json($trajet);
    }

    public function destroy(Trajet $trajet)
    {
        $this->authorize('delete', $trajet); // policy : refuse si statut === 'termine'
        $trajet->delete(); // soft delete
        return response()->json(['message' => 'Trajet supprimé']);
    }

    public function demarrer(Trajet $trajet)
    {
        $this->authorize('update', $trajet);

        if ($trajet->statut !== 'planifie') {
            return response()->json(['message' => 'Seul un trajet planifié peut être démarré'], 422);
        }

        $trajet->update(['statut' => 'en_cours']);

        return response()->json($trajet);
    }

    public function terminer(Trajet $trajet)
    {
        $this->authorize('update', $trajet);

        if ($trajet->statut !== 'en_cours') {
            return response()->json(['message' => 'Seul un trajet en cours peut être terminé'], 422);
        }

        $trajet->update(['statut' => 'termine']);

        return response()->json($trajet);
    }

    public function annuler(Trajet $trajet)
    {
        $this->authorize('update', $trajet);

        if ($trajet->statut !== 'planifie') {
            return response()->json(['message' => 'Un trajet en cours ou terminé ne peut pas être annulé'], 422);
        }

        $trajet->update(['statut' => 'annule']);

        return response()->json($trajet);
    }
}
