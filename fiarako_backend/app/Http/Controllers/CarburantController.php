<?php

namespace App\Http\Controllers;

use App\Models\Carburant;
use Illuminate\Http\Request;

class CarburantController extends Controller
{
    // Méthode pour obtenir tous les carburants avec état >= 10, triés par date d'annonce
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 15); // Par défaut, 15 résultats par page

        $carburants = Carburant::where('etat', '>=', 10)
            ->orderByDesc('created_at') // Tri décroissant par la date d'ajout
            ->paginate($perPage); // Pagination

        return response()->json($carburants);
    }

    // Méthode pour créer un nouveau carburant
    public function store(Request $request)
    {
        $request->validate([
            'label' => 'required|string|max:255',
            'etat' => 'required|in:10', // S'assurer que l'état est 10 lors de la création
        ]);

        $carburant = Carburant::create([
            'label' => $request->label,
            'etat' => 10, // L'état par défaut est 10 lors de la création
        ]);

        return response()->json($carburant, 201);
    }

    // Méthode pour mettre à jour un carburant
    public function update(Request $request, $id)
    {
        $carburant = Carburant::find($id);

        if (!$carburant) {
            return response()->json(['message' => 'Carburant non trouvé'], 404);
        }

        $request->validate([
            'label' => 'required|string|max:255',
            'etat' => 'nullable|in:10, -10', // L'état peut être 10 ou -10
        ]);

        $carburant->label = $request->input('label', $carburant->label);
        $carburant->etat = $request->input('etat', $carburant->etat);
        $carburant->save();

        return response()->json($carburant);
    }

    // Méthode pour supprimer un carburant (en réalité on change l'état à -10)
    public function destroy($id)
    {
        $carburant = Carburant::find($id);

        if (!$carburant) {
            return response()->json(['message' => 'Carburant non trouvé'], 404);
        }

        // Changer l'état à -10 pour marquer comme supprimé
        $carburant->etat = -10;
        $carburant->save();

        return response()->json(['message' => 'Carburant marqué comme supprimé']);
    }
}
