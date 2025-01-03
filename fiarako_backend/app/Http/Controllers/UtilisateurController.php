<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;

class UtilisateurController extends Controller
{
    public function index()
    {
        // Récupérer tous les utilisateurs
        $utilisateurs = Utilisateur::all();
        return response()->json($utilisateurs);
    }

    public function create()
    {
        // Si vous utilisez une vue pour la création
        return view('utilisateurs.create');
    }

    public function store(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'mdp' => 'required|string|min:8',
            'email' => 'required|email|unique:utilisateurs',
            'telephone' => 'required|string|max:20',
            'etat' => 'required|integer|in:0,1',
        ]);

        // Création de l'utilisateur
        $utilisateur = Utilisateur::create($validated);
        return response()->json(['message' => 'Utilisateur créé avec succès!', 'data' => $utilisateur], 201);
    }

    public function show($id)
    {
        // Afficher un utilisateur spécifique
        $utilisateur = Utilisateur::findOrFail($id);
        return response()->json($utilisateur);
    }

    public function edit($id)
    {
        // Si vous utilisez une vue pour l'édition
        $utilisateur = Utilisateur::findOrFail($id);
        return view('utilisateurs.edit', compact('utilisateur'));
    }

    public function update(Request $request, $id)
    {
        // Validation des données
        $validated = $request->validate([
            'nom' => 'sometimes|string|max:255',
            'mdp' => 'sometimes|string|min:8',
            'email' => 'sometimes|email|unique:utilisateurs,email,' . $id,
            'telephone' => 'sometimes|string|max:20',
            'etat' => 'sometimes|integer|in:0,1',
        ]);

        // Mise à jour de l'utilisateur
        $utilisateur = Utilisateur::findOrFail($id);
        $utilisateur->update($validated);
        return response()->json(['message' => 'Utilisateur mis à jour avec succès!', 'data' => $utilisateur]);
    }

    public function destroy($id)
    {
        // Suppression d'un utilisateur
        $utilisateur = Utilisateur::findOrFail($id);
        $utilisateur->delete();
        return response()->json(['message' => 'Utilisateur supprimé avec succès!']);
    }
}
