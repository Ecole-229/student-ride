<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Vehicule;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class VehiculeController extends Controller
{
    public function index()
    {
        $vehicules = Vehicule::with('conducteur.user')->get();
        return response()->json([
            'message' => 'Liste des véhicules et leurs conducteurs récupérée avec succès.',
            'vehicules' => $vehicules
        ], 200);
    }

    public function show($id)
    {
        $vehicule = Vehicule::with('conducteur.user')->find($id);
        if (!$vehicule) {
            return response()->json([
                'message' => 'Véhicule non trouvé.'
            ], 404);
        }
        return response()->json([
            'message' => 'Véhicule récupéré avec succès.',
            'vehicule' => $vehicule
        ], 200);
    }
    public function store(Request $request)
    {
        $request->validate([
            'conducteur_id' => 'required|exists:conducteurs,id',
            'marque' => 'required|string|max:255',
            'type_vehicule' => ['required', Rule::in(['voiture', 'moto'])],
            'immatriculation' => 'required|string|max:255|unique:vehicules',
            'media' => 'nullable|string|max:255',
        ]);

        $vehicule = Vehicule::create($request->all());

        return response()->json([
            'message' => 'Véhicule créé avec succès.',
            'vehicule' => $vehicule
        ], 201);
    }
    public function update(Request $request, $id)
    {
        $vehicule = Vehicule::find($id);
        if (!$vehicule) {
            return response()->json([
                'message' => 'Véhicule non trouvé.'
            ], 404);
        }

        $request->validate([
            'conducteur_id' => 'sometimes|required|exists:conducteurs,id',
            'marque' => 'sometimes|required|string|max:255',
            'type_vehicule' => ['sometimes', 'required', Rule::in(['voiture', 'moto'])],
            'immatriculation' => ['sometimes', 'required', 'string', 'max:255', Rule::unique('vehicules')->ignore($vehicule->id)],
            'media' => 'nullable|string|max:255',
        ]);

        $vehicule->update($request->all());

        return response()->json([
            'message' => 'Véhicule mis à jour avec succès.',
            'vehicule' => $vehicule
        ], 200);
    }
    public function destroy($id)
    {
        $vehicule = Vehicule::find($id);
        if (!$vehicule) {
            return response()->json([
                'message' => 'Véhicule non trouvé.'
            ], 404);
        }

        $vehicule->delete();

        return response()->json([
            'message' => 'Véhicule supprimé avec succès.'
        ], 200);
    }
}
