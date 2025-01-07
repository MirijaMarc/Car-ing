<?php

namespace App\Http\Controllers;

use App\Models\Transmission;
use Illuminate\Http\Request;

class TransmissionController extends Controller
{
    // Méthode pour obtenir toutes les transmissions
    public function index()
    {
        $transmissions = Transmission::where('etat', '>=', 10) // Filtrer les transmissions avec état >= 10
            ->paginate(10); // Pagination de 10 résultats par page

        return response()->json($transmissions);
    }

    // Méthode pour créer une nouvelle transmission
    public function store(Request $request)
    {
        $request->validate([
            'label' => 'required|string|max:255',
            'etat' => 'required|in:10', // L'état par défaut est 10 lors de la création
        ]);

        $transmission = Transmission::create([
            'label' => $request->label,
            'etat' => 10, // L'état par défaut est 10
        ]);

        return response()->json($transmission, 201);
    }

    // Méthode pour mettre à jour une transmission
    public function update(Request $request, $id)
    {
        $transmission = Transmission::find($id);

        if (!$transmission) {
            return response()->json(['message' => 'Transmission non trouvée'], 404);
        }

        $request->validate([
            'label' => 'nullable|string|max:255',
            'etat' => 'nullable|in:10, -10', // L'état peut être 10 ou -10
        ]);

        $transmission->label = $request->input('label', $transmission->label);
        $transmission->etat = $request->input('etat', $transmission->etat);
        $transmission->save();

        return response()->json($transmission);
    }

    // Méthode pour supprimer une transmission (en réalité, on change l'état à -10)
    public function destroy($id)
    {
        $transmission = Transmission::find($id);

        if (!$transmission) {
            return response()->json(['message' => 'Transmission non trouvée'], 404);
        }

        // Changer l'état à -10 pour marquer comme supprimée
        $transmission->etat = -10;
        $transmission->save();

        return response()->json(['message' => 'Transmission marquée comme supprimée']);
    }
}
