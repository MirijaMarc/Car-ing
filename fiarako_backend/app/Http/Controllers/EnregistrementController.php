<?php

namespace App\Http\Controllers;

use App\Models\Enregistrement;
use Illuminate\Http\Request;

class EnregistrementController extends Controller
{
    // Méthode pour obtenir tous les enregistrements avec état >= 10, triés par date d'annonce
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 15); // Pagination, 15 résultats par page par défaut

        $enregistrements = Enregistrement::where('etat', '>=', 10)
            ->paginate($perPage); // Pagination

        return response()->json($enregistrements);
    }

    // Méthode pour créer un nouvel enregistrement
    public function store(Request $request)
    {
        $request->validate([
            'utilisateur_id' => 'required|integer|exists:utilisateurs,id',
            'annonce_id' => 'required|integer|exists:annonces,id',
            'date' => 'required|date',
            'etat' => 'required|in:10', // S'assurer que l'état est 10 lors de la création
        ]);

        $enregistrement = Enregistrement::create([
            'utilisateur_id' => $request->utilisateur_id,
            'annonce_id' => $request->annonce_id,
            'date' => $request->date,
            'etat' => 10, // L'état par défaut est 10 lors de la création
        ]);

        return response()->json($enregistrement, 201);
    }

    // Méthode pour mettre à jour un enregistrement
    public function update(Request $request, $id)
    {
        $enregistrement = Enregistrement::find($id);

        if (!$enregistrement) {
            return response()->json(['message' => 'Enregistrement non trouvé'], 404);
        }

        $request->validate([
            'utilisateur_id' => 'nullable|integer|exists:utilisateurs,id',
            'annonce_id' => 'nullable|integer|exists:annonces,id',
            'date' => 'nullable|date',
            'etat' => 'nullable|in:10, -10', // L'état peut être 10 ou -10
        ]);

        $enregistrement->utilisateur_id = $request->input('utilisateur_id', $enregistrement->utilisateur_id);
        $enregistrement->annonce_id = $request->input('annonce_id', $enregistrement->annonce_id);
        $enregistrement->date = $request->input('date', $enregistrement->date);
        $enregistrement->etat = $request->input('etat', $enregistrement->etat);
        $enregistrement->save();

        return response()->json($enregistrement);
    }

    // Méthode pour supprimer un enregistrement (en réalité on change l'état à -10)
    public function destroy($id)
    {
        $enregistrement = Enregistrement::find($id);

        if (!$enregistrement) {
            return response()->json(['message' => 'Enregistrement non trouvé'], 404);
        }

        // Changer l'état à -10 pour marquer comme supprimée
        $enregistrement->etat = -10;
        $enregistrement->save();

        return response()->json(['message' => 'Enregistrement marqué comme supprimé']);
    }
}
