<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    // Méthode pour obtenir toutes les images d'une annonce
    public function index($annonceId)
    {
        $images = Image::where('annonce_id', $annonceId)
            ->where('etat', '>=', 10) // Prendre les images avec état >= 10
            ->get();

        return response()->json($images);
    }

    // Méthode pour créer une nouvelle image
    public function store(Request $request)
    {
        $request->validate([
            'label' => 'required|string|max:255',
            'annonce_id' => 'required|integer|exists:annonces,id',
            'etat' => 'required|in:10', // L'état par défaut est 10 lors de la création
        ]);

        $image = Image::create([
            'label' => $request->label,
            'annonce_id' => $request->annonce_id,
            'etat' => 10, // L'état par défaut est 10
        ]);

        return response()->json($image, 201);
    }

    // Méthode pour mettre à jour une image
    public function update(Request $request, $id)
    {
        $image = Image::find($id);

        if (!$image) {
            return response()->json(['message' => 'Image non trouvée'], 404);
        }

        $request->validate([
            'label' => 'nullable|string|max:255',
            'etat' => 'nullable|in:10, -10', // L'état peut être 10 ou -10
        ]);

        $image->label = $request->input('label', $image->label);
        $image->etat = $request->input('etat', $image->etat);
        $image->save();

        return response()->json($image);
    }

    // Méthode pour supprimer une image (en réalité on change l'état à -10)
    public function destroy($id)
    {
        $image = Image::find($id);

        if (!$image) {
            return response()->json(['message' => 'Image non trouvée'], 404);
        }

        // Changer l'état à -10 pour marquer comme supprimée
        $image->etat = -10;
        $image->save();

        return response()->json(['message' => 'Image marquée comme supprimée']);
    }
}
