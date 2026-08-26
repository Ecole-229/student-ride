<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Conducteur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ConducteurController extends Controller
{
    public function index()
    {
        $conducteurs = Conducteur::with('user')->get();
        return response()->json([
            'message' => 'Liste des conducteurs récupérée avec succès.',
            'conducteurs' => $conducteurs
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
        ]);
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
    
}
