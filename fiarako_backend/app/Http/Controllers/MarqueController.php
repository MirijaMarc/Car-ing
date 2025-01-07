<?php

namespace App\Http\Controllers;

use App\Models\Marque;
use Illuminate\Http\Request;

class MarqueController extends Controller
{
    // Méthode pour obtenir toutes les marques
    public function index()
    {
        $marques = Marque::where('etat', '>=', 10) // Filtrer les marques avec état >= 10
            ->paginate(10); // Pagination de 10 résultats par page

        return response()->json($marques);
    }

    // Méthode pour créer une nouvelle marque
    public function store(Request $request)
    {
        $request->validate([
            'label' => 'required|string|max:255',
            'etat' => 'required|in:10', // L'état par défaut est 10 lors de la création
        ]);

        $marque = Marque::create([
            'label' => $request->label,
            'etat' => 10, // L'état par défaut est 10
        ]);

        return response()->json($marque, 201);
    }

    // Méthode pour mettre à jour une marque
    public function update(Request $request, $id)
    {
        $marque = Marque::find($id);

        if (!$marque) {
            return response()->json(['message' => 'Marque non trouvée'], 404);
        }

        $request->validate([
            'label' => 'nullable|string|max:255',
            'etat' => 'nullable|in:10, -10', // L'état peut être 10 ou -10
        ]);

        $marque->label = $request->input('label', $marque->label);
        $marque->etat = $request->input('etat', $marque->etat);
        $marque->save();

        return response()->json($marque);
    }

    // Méthode pour supprimer une marque (en réalité, on change l'état à -10)
    public function destroy($id)
    {
        $marque = Marque::find($id);

        if (!$marque) {
            return response()->json(['message' => 'Marque non trouvée'], 404);
        }

        // Changer l'état à -10 pour marquer comme supprimée
        $marque->etat = -10;
        $marque->save();

        return response()->json(['message' => 'Marque marquée comme supprimée']);
    }
}
