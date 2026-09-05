<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\Trajet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    public function index()
    {
        $passager = Auth::user()->passager;
        return response()->json(
           [
                'message' => 'Liste des réservations récupérée avec succès.',
                'reservations' => $passager->reservations()->with('trajet.conducteur.user', 'trajet.vehicule')->get()
            ]
        );
    }

    // Réservations reçues par le conducteur connecté (pour qu'il les traite)
    public function recues()
    {
        $conducteur = Auth::user()->conducteur;

        $reservations = Reservation::whereHas('trajet', function ($q) use ($conducteur) {
            $q->where('conducteur_id', $conducteur->id);
        })->with('trajet', 'passager.user')->get();

        return response()->json([
            'message' => 'Liste des réservations reçues récupérée avec succès.',
            'reservations' => $reservations
        ]);
    }

    public function store(Request $request, Trajet $trajet)
    {
        $passager = Auth::user()->passager;

        if (!$passager) {
            return response()->json(['message' => 'Seul un passager peut réserver'], 403);
        }

        $validated = $request->validate([
            'nombre_places_reservees' => 'required|integer|min:1',
        ]);

        return DB::transaction(function () use ($trajet, $passager, $validated) {
            $trajet = Trajet::where('id', $trajet->id)->lockForUpdate()->first();

            if ($trajet->statut !== 'planifie') {
                abort(422, 'Ce trajet n\'accepte plus de réservations');
            }

            if ($trajet->places_disponibles < $validated['nombre_places_reservees']) {
                abort(422, 'Places insuffisantes');
            }

            // Statut par défaut : en_attente, tant que le conducteur n'a pas validé
            $reservation = $passager->reservations()->create([
                'trajet_id' => $trajet->id,
                'nombre_places_reservees' => $validated['nombre_places_reservees'],
                'statut' => 'en_attente',
            ]);

            // On réserve déjà les places pour éviter la sur-réservation
            // pendant que le conducteur décide ; elles seront rendues
            // si la réservation est refusée ou annulée.
            $trajet->decrement('places_disponibles', $validated['nombre_places_reservees']);

            return response()->json([
                'message' => 'Réservation enregistrée avec succès.',
                'data' => $reservation
            ], 201);
        });
    }

    public function confirmer(Reservation $reservation)
    {
        $conducteur = Auth::user()->conducteur;

        if (!$conducteur || $reservation->trajet->conducteur_id !== $conducteur->id) {
            return response()->json(['message' => 'Non autorisé'], 403);
        }

        if ($reservation->statut !== 'en_attente') {
            return response()->json(['message' => 'Cette réservation a déjà été traitée'], 422);
        }

        $reservation->update(['statut' => 'confirmee']);

        return response()->json([
            'message' => 'Réservation confirmée',
            'data' => $reservation
        ]);
    }

    // Le conducteur refuse une réservation en_attente
    public function refuser(Reservation $reservation)
    {
        $conducteur = Auth::user()->conducteur;

        if (!$conducteur || $reservation->trajet->conducteur_id !== $conducteur->id) {
            return response()->json(['message' => 'Non autorisé'], 403);
        }

        if ($reservation->statut !== 'en_attente') {
            return response()->json(['message' => 'Cette réservation a déjà été traitée'], 422);
        }

        DB::transaction(function () use ($reservation) {
            $reservation->update(['statut' => 'refusee']);
            $reservation->trajet->increment('places_disponibles', $reservation->nombre_places_reservees);
        });

        return response()->json([
            'message' => 'Réservation refusée',
            'data' => $reservation
        ]);
    }

    // Le passager annule sa propre réservation (en_attente ou confirmee)
    public function destroy(Reservation $reservation)
    {
        $passager = Auth::user()->passager;

        if (!$passager || $reservation->passager_id !== $passager->id) {
            return response()->json(['message' => 'Non autorisé'], 403);
        }

        if (!in_array($reservation->trajet->statut, ['planifie'])) {
            return response()->json(['message' => 'Impossible d\'annuler une réservation d\'un trajet déjà démarré'], 422);
        }

        if ($reservation->statut === 'annulee') {
            return response()->json(['message' => 'Réservation déjà annulée'], 422);
        }

        DB::transaction(function () use ($reservation) {
            $reservation->update(['statut' => 'annulee']);
            $reservation->trajet->increment('places_disponibles', $reservation->nombre_places_reservees);
        });

        return response()->json([
            'message' => 'Réservation annulée',
            'data' => $reservation
        ]);
    }
}
