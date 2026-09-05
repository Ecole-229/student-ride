<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Conducteur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Api\VehiculeController;

class ConducteurController extends Controller
{
    public function index()
    {
        $demandeconducteurs = Conducteur::with('user')->where('status', 'non_confirmee')->get();
        $conducteurConfirme = Conducteur::with('user')->where('status', 'confirmee')->get();
        return response()->json([
            'message' => 'Liste des demande conducteurs récupérée avec succès.',
            'data' => [
                'demandeconducteurs' => $demandeconducteurs,
                'conducteurConfirme' => $conducteurConfirme
            ]
        ], 200);


    }
    public function confirmerConducteur($id)
    {
        $conducteur = Conducteur::find($id);
        if (!$conducteur) {
            return response()->json([
                'message' => 'Conducteur non trouvé.'
            ], 404);
        }

        $conducteur->update(['confirmee' => 'confirmee']);

        return response()->json([
            'message' => 'Conducteur confirmé avec succès.',
            'conducteur' => $conducteur
        ], 200);
    }

    public function store(Request $request)
    {
       $validate = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
        ]);
        if ($validate->fails()) {
            return response()->json([
                'errors' => $validate->errors(),
                'message' => 'Les données fournies sont invalides.'
            ], 422);
        }
        $conducteur = Conducteur::create([
            'user_id' => $request->user_id,
            'confirmee' => 'non_confirmee'
        ]);
      $vehiculeController = new VehiculeController();
      $vehiculeController->store($request);

        return response()->json([
            'message' => 'Conducteur créé avec succès.',
            'conducteur' => $conducteur
        ], 201);
    }
    public function show($id)
    {
        $conducteur = Conducteur::with('user')->find($id);
        if (!$conducteur) {
            return response()->json([
                'message' => 'Conducteur non trouvé.'
            ], 404);
        }
        return response()->json([
            'message' => 'Conducteur récupéré avec succès.',
            'conducteur' => $conducteur
        ], 200);
    }
    public function showReservationEnAttenteTrajet($id)
    {
        $conducteur = Conducteur::with(['user', 'trajets.reservations' => function ($query) {
            $query->where('statut', 'en_attente');
        }])->find($id);

        if (!$conducteur) {
            return response()->json([
                'message' => 'Conducteur non trouvé.'
            ], 404);
        }

        return response()->json([
            'message' => 'Conducteur et réservations en attente récupérés avec succès.',
            'conducteur' => $conducteur
        ], 200);
    }
    public function showReservationConfirmeeTrajet($id)
    {
        $conducteur = Conducteur::with(['user', 'trajets.reservations' => function ($query) {
            $query->where('statut', 'confirmee');
        }])->find($id);

        if (!$conducteur) {
            return response()->json([
                'message' => 'Conducteur non trouvé.'
            ], 404);
        }

        return response()->json([
            'message' => 'Conducteur et réservations confirmées récupérés avec succès.',
            'conducteur' => $conducteur
        ], 200);
    }
    public function update(Request $request, $id)
    {
        $conducteur = Conducteur::find($id);
        if (!$conducteur) {
            return response()->json([
                'message' => 'Conducteur non trouvé.'
            ], 404);
        }

        $validate = Validator::make($request->all(), [
            'user_id' => 'sometimes|exists:users,id',
        ]);
        if ($validate->fails()) {
            return response()->json([
                'errors' => $validate->errors(),
                'message' => 'Les données fournies sont invalides.'
            ], 422);
        }

        $conducteur->update($request->only(['user_id']));

        return response()->json([
            'message' => 'Conducteur mis à jour avec succès.',
            'conducteur' => $conducteur
        ], 200);
    }
public function devenirConducteur(Request $request)
    {
        $user = $request->user();

        if ($user->conducteur) {
            return response()->json([
                'message' => 'Vous êtes déjà un conducteur.',
                'conducteur' => $user->conducteur
            ], 400);
        }

        $conducteur = Conducteur::create([
            'user_id' => $user->id,
        ]);

        return response()->json([
            'message' => 'Vous êtes maintenant un conducteur.',
            'conducteur' => $conducteur
        ], 201);
    }
    public function destroy($id)
    {
        $conducteur = Conducteur::find($id);
        if (!$conducteur) {
            return response()->json([
                'message' => 'Conducteur non trouvé.'
            ], 404);
        }

        $conducteur->delete();

        return response()->json([
            'message' => 'Conducteur supprimé avec succès.'
        ], 200);
    }

}
