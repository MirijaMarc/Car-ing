<?php

namespace App\Http\Controllers;

use App\Models\Modele;
use Illuminate\Http\Request;

class ModeleController extends Controller
{
    // Méthode pour obtenir tous les modèles
    public function index()
    {
        $modeles = Modele::where('etat', '>=', 10) // Filtrer les modèles avec état >= 10
            ->orderBy('created_at', 'desc') // Trier par date de création (ordre décroissant)
            ->paginate(10); // Pagination de 10 résultats par page

        return response()->json($modeles);
    }

    // Méthode pour créer un nouveau modèle
    public function store(Request $request)
    {
        $request->validate([
            'label' => 'required|string|max:255',
            'etat' => 'required|in:10', // L'état par défaut est 10 lors de la création
            'marque_id' => 'required|exists:marques,id', // Vérifier que la marque existe
        ]);

        $modele = Modele::create([
            'label' => $request->label,
            'etat' => 10, // L'état par défaut est 10
            'marque_id' => $request->marque_id,
        ]);

        return response()->json($modele, 201);
    }

    // Méthode pour mettre à jour un modèle
    public function update(Request $request, $id)
    {
        $modele = Modele::find($id);

        if (!$modele) {
            return response()->json(['message' => 'Modèle non trouvé'], 404);
        }

        $request->validate([
            'label' => 'nullable|string|max:255',
            'etat' => 'nullable|in:10, -10', // L'état peut être 10 ou -10
            'marque_id' => 'nullable|exists:marques,id', // Vérifier que la marque existe
        ]);

        $modele->label = $request->input('label', $modele->label);
        $modele->etat = $request->input('etat', $modele->etat);
        $modele->marque_id = $request->input('marque_id', $modele->marque_id);
        $modele->save();

        return response()->json($modele);
    }

    // Méthode pour supprimer un modèle (en réalité, on change l'état à -10)
    public function destroy($id)
    {
        $modele = Modele::find($id);

        if (!$modele) {
            return response()->json(['message' => 'Modèle non trouvé'], 404);
        }

        // Changer l'état à -10 pour marquer comme supprimée
        $modele->etat = -10;
        $modele->save();

        return response()->json(['message' => 'Modèle marqué comme supprimé']);
    }
}
