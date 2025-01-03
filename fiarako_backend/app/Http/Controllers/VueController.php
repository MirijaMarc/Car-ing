<?php

namespace App\Http\Controllers;

use App\Models\Vue;
use Illuminate\Http\Request;

class VueController extends Controller
{
    // Méthode pour obtenir toutes les vues
    public function index()
    {
        $vues = Vue::where('etat', '>=', 10) // Filtrer les vues avec état >= 10
            ->orderBy('date', 'desc') // Trier par date dans l'ordre décroissant
            ->paginate(10); // Pagination de 10 résultats par page

        return response()->json($vues);
    }

    // Méthode pour créer une nouvelle vue
    public function store(Request $request)
    {
        $request->validate([
            'utilisateur_id' => 'required|integer',
            'annonce_id' => 'required|integer',
            'date' => 'required|date',
            'etat' => 'required|in:10', // L'état par défaut est 10 lors de la création
        ]);

        $vue = Vue::create([
            'utilisateur_id' => $request->utilisateur_id,
            'annonce_id' => $request->annonce_id,
            'date' => $request->date,
            'etat' => 10, // L'état par défaut est 10
        ]);

        return response()->json($vue, 201);
    }

    // Méthode pour mettre à jour une vue
    public function update(Request $request, $id)
    {
        $vue = Vue::find($id);

        if (!$vue) {
            return response()->json(['message' => 'Vue non trouvée'], 404);
        }

        $request->validate([
            'utilisateur_id' => 'nullable|integer',
            'annonce_id' => 'nullable|integer',
            'date' => 'nullable|date',
            'etat' => 'nullable|in:10, -10', // L'état peut être 10 ou -10
        ]);

        $vue->utilisateur_id = $request->input('utilisateur_id', $vue->utilisateur_id);
        $vue->annonce_id = $request->input('annonce_id', $vue->annonce_id);
        $vue->date = $request->input('date', $vue->date);
        $vue->etat = $request->input('etat', $vue->etat);
        $vue->save();

        return response()->json($vue);
    }

    // Méthode pour supprimer une vue (en réalité, on change l'état à -10)
    public function destroy($id)
    {
        $vue = Vue::find($id);

        if (!$vue) {
            return response()->json(['message' => 'Vue non trouvée'], 404);
        }

        // Changer l'état à -10 pour marquer comme supprimée
        $vue->etat = -10;
        $vue->save();

        return response()->json(['message' => 'Vue marquée comme supprimée']);
    }
}
