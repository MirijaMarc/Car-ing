<?php

namespace App\Http\Controllers;

use App\Models\Couleur;
use Illuminate\Http\Request;

class CouleurController extends Controller
{
    // Méthode pour obtenir toutes les couleurs avec état >= 10, triées par date d'annonce
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 15); // Pagination, 15 résultats par page par défaut

        $couleurs = Couleur::where('etat', '>=', 10)
            ->orderByDesc('created_at') // Tri décroissant par date d'ajout
            ->paginate($perPage); // Pagination

        return response()->json($couleurs);
    }

    // Méthode pour créer une nouvelle couleur
    public function store(Request $request)
    {
        $request->validate([
            'label' => 'required|string|max:255',
            'etat' => 'required|in:10', // S'assurer que l'état est 10 lors de la création
        ]);

        $couleur = Couleur::create([
            'label' => $request->label,
            'etat' => 10, // L'état par défaut est 10 lors de la création
        ]);

        return response()->json($couleur, 201);
    }

    // Méthode pour mettre à jour une couleur
    public function update(Request $request, $id)
    {
        $couleur = Couleur::find($id);

        if (!$couleur) {
            return response()->json(['message' => 'Couleur non trouvée'], 404);
        }

        $request->validate([
            'label' => 'required|string|max:255',
            'etat' => 'nullable|in:10, -10', // L'état peut être 10 ou -10
        ]);

        $couleur->label = $request->input('label', $couleur->label);
        $couleur->etat = $request->input('etat', $couleur->etat);
        $couleur->save();

        return response()->json($couleur);
    }

    // Méthode pour supprimer une couleur (en réalité on change l'état à -10)
    public function destroy($id)
    {
        $couleur = Couleur::find($id);

        if (!$couleur) {
            return response()->json(['message' => 'Couleur non trouvée'], 404);
        }

        // Changer l'état à -10 pour marquer comme supprimée
        $couleur->etat = -10;
        $couleur->save();

        return response()->json(['message' => 'Couleur marquée comme supprimée']);
    }
}
