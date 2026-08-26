<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string',
            'phone' => 'required|string|max:20',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'errors' => $validate->errors(),
                'message' => 'Les données fournies sont invalides.'
            ], 422);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
        ]);
        return response()->json([
            'message' => 'Inscription réussie.',
            'data' => $user,
        ], 201);
    }
    public function login(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'errors' => $validate->errors(),
                'message' => 'Les données fournies sont invalides.'
            ], 422);
        }
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json([
                'message' => 'Aucun utilisateur enregistré avec cet email.',
            ], 404);

        } else if ($user && !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Mot de passe incorrect.',
            ], 401);
        } else if (Hash::check($request->password, $user->password) && $user->statut === 'bloque') {

            return response()->json([
                'message' => 'Votre compte est bloqué.',
                'data' => $user,
            ], 403);
        } else if ($user && Hash::check($request->password, $user->password) && $user->statut !== 'bloque') {

            $accessToken = $user->createToken('authToken')->accessToken;
            $refreshToken = $user->createToken('refreshToken')->accessToken;

            return response()->json([
                'message' => 'Connexion réussie.',
                'data' => $user,
                'access_token' => $accessToken,
                'refresh_token' => $refreshToken,
            ], 200);
        }
    }
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Déconnexion réussie.',
        ], 200);
    }
}
