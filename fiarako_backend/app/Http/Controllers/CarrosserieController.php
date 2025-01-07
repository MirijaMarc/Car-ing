<?php

namespace App\Http\Controllers;

use App\Models\Carrosserie;
use Illuminate\Http\Request;

class CarrosserieController extends Controller
{
    // Méthode pour obtenir toutes les carrosseries avec état >= 10, triées par date d'annonce
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 15); // Pagination, 15 résultats par page par défaut

        $carrosseries = Carrosserie::where('etat', '>=', 10)
            ->paginate($perPage); // Pagination

        return response()->json($carrosseries);
    }

    // Méthode pour créer une nouvelle carrosserie
    public function store(Request $request)
    {
        $request->validate([
            'label' => 'required|string|max:255',
            'etat' => 'required|in:10', // S'assurer que l'état est 10 lors de la création
        ]);

        $carrosserie = Carrosserie::create([
            'label' => $request->label,
            'etat' => 10, // L'état par défaut est 10 lors de la création
        ]);

        return response()->json($carrosserie, 201);
    }

    // Méthode pour mettre à jour une carrosserie
    public function update(Request $request, $id)
    {
        $carrosserie = Carrosserie::find($id);

        if (!$carrosserie) {
            return response()->json(['message' => 'Carrosserie non trouvée'], 404);
        }

        $request->validate([
            'label' => 'required|string|max:255',
            'etat' => 'nullable|in:10, -10', // L'état peut être 10 ou -10
        ]);

        $carrosserie->label = $request->input('label', $carrosserie->label);
        $carrosserie->etat = $request->input('etat', $carrosserie->etat);
        $carrosserie->save();

        return response()->json($carrosserie);
    }

    // Méthode pour supprimer une carrosserie (en réalité on change l'état à -10)
    public function destroy($id)
    {
        $carrosserie = Carrosserie::find($id);

        if (!$carrosserie) {
            return response()->json(['message' => 'Carrosserie non trouvée'], 404);
        }

        // Changer l'état à -10 pour marquer comme supprimé
        $carrosserie->etat = -10;
        $carrosserie->save();

        return response()->json(['message' => 'Carrosserie marquée comme supprimée']);
    }
}
