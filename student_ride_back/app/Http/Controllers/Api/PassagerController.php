<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Passager;
use Illuminate\Http\Request;

class PassagerController extends Controller
{
    public function index()
    {
        $passagers = Passager::with('user')->get();
        return response()->json([
            'message' => 'Liste des passagers récupérée avec succès.',
            'passagers' => $passagers
        ], 200);
    }
    public function show($id)
    {
        $passager = Passager::with('user')->find($id);
        if (!$passager) {
            return response()->json([
                'message' => 'Passager non trouvé.'
            ], 404);
        }
        return response()->json([
            'message' => 'Passager récupéré avec succès.',
            'passager' => $passager
        ], 200);
    }
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        $passager = Passager::create($request->all());

        return response()->json([
            'message' => 'Passager créé avec succès.',
            'passager' => $passager
        ], 201);
    }
}
