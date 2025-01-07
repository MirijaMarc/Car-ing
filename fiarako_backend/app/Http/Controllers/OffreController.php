<?php

namespace App\Http\Controllers;

use App\Models\Offre;
use Illuminate\Http\Request;

class OffreController extends Controller
{
    // Méthode pour obtenir toutes les offres
    public function index()
    {
        $offres = Offre::where('etat', '>=', 10) // Filtrer les offres avec état >= 10
            ->paginate(10); // Pagination de 10 résultats par page

        return response()->json($offres);
    }

    // Méthode pour créer une nouvelle offre
    public function store(Request $request)
    {
        $request->validate([
            'prix' => 'required|numeric',
            'label' => 'required|string|max:255',
            'email' => 'required|email',
            'telephone' => 'required|string|max:255',
            'etat' => 'required|in:10', // L'état par défaut est 10 lors de la création
            'annonce_id' => 'required|exists:annonces,id', // Vérifier que l'annonce existe
        ]);

        $offre = Offre::create([
            'prix' => $request->prix,
            'label' => $request->label,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'etat' => 10, // L'état par défaut est 10
            'annonce_id' => $request->annonce_id,
        ]);

        return response()->json($offre, 201);
    }

    // Méthode pour mettre à jour une offre
    public function update(Request $request, $id)
    {
        $offre = Offre::find($id);

        if (!$offre) {
            return response()->json(['message' => 'Offre non trouvée'], 404);
        }

        $request->validate([
            'prix' => 'nullable|numeric',
            'label' => 'nullable|string|max:255',
            'email' => 'nullable|email',
            'telephone' => 'nullable|string|max:255',
            'etat' => 'nullable|in:10, -10', // L'état peut être 10 ou -10
            'annonce_id' => 'nullable|exists:annonces,id', // Vérifier que l'annonce existe
        ]);

        $offre->prix = $request->input('prix', $offre->prix);
        $offre->label = $request->input('label', $offre->label);
        $offre->email = $request->input('email', $offre->email);
        $offre->telephone = $request->input('telephone', $offre->telephone);
        $offre->etat = $request->input('etat', $offre->etat);
        $offre->annonce_id = $request->input('annonce_id', $offre->annonce_id);
        $offre->save();

        return response()->json($offre);
    }

    // Méthode pour supprimer une offre (en réalité, on change l'état à -10)
    public function destroy($id)
    {
        $offre = Offre::find($id);

        if (!$offre) {
            return response()->json(['message' => 'Offre non trouvée'], 404);
        }

        // Changer l'état à -10 pour marquer comme supprimée
        $offre->etat = -10;
        $offre->save();

        return response()->json(['message' => 'Offre marquée comme supprimée']);
    }
}
