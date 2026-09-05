<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Conducteur;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function confirmerConducteur($id)
    {
        $conducteur = Conducteur::find($id);
        if (!$conducteur) {
            return response()->json([
                'message' => 'Conducteur non trouvé.'
            ], 404);
        }

        $conducteur->update(['status' => 'confirmee']);
        $conducteur->user()->assignRole('conducteur');
        $conducteur->user()->removeRole('passager');
        return response()->json([
            'message' => 'Conducteur confirmé avec succès.',
            'conducteur' => $conducteur
        ], 200);
    }

}
