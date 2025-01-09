<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annonce;

class AnnonceController extends Controller
{
    // Méthode pour obtenir toutes les annonces, avec pagination et tri par date_annonce
    public function index(Request $request)
    {
        return $this->getFilteredAnnonces($request);
    }

    public function getFilteredAnnonces(Request $request)
    {
        // Récupérer tous les paramètres de la requête
        $filters = $request->all();

        // Construire la requête de base et charger les relations
        $query = Annonce::with(['modele.marque', 'couleur', 'carburant', 'transmission'])
                ->whereHas('carrosserie', function($q){
                    $q->where('isMoto', false);
                });


        // Recherche par mot-clé (appliquée sur moteur, prix, annee, etc.)
        if (!empty($filters['keyword'])) {
            $keyword = $filters['keyword'];
            $query->where(function ($q) use ($keyword) {
                $q->where('moteur', 'ILIKE', "%$keyword%")
                  ->orWhereHas('modele', function ($q) use ($keyword) {
                      $q->where('label', 'ILIKE', "%$keyword%");
                  })
                  ->orWhereHas('modele.marque', function ($q) use ($keyword) {
                      $q->where('label', 'ILIKE', "%$keyword%");
                  });
            });
        }

        // Filtres sur les relations
        if (!empty($filters['marque_id'])) {
            $query->whereHas('modele.marque', function ($q) use ($filters) {
                $q->where('id', $filters['marque_id']);
            });
        }

        if (!empty($filters['modele_id'])) {
            $query->where('modele_id', $filters['modele_id']);
        }

        // Autres filtres (kilométrage, prix, etc.)
        if (!empty($filters['kilometrage_min'])) {
            $query->where('kilometrage', '>=', $filters['kilometrage_min']);
        }

        if (!empty($filters['kilometrage_max'])) {
            $query->where('kilometrage', '<=', $filters['kilometrage_max']);
        }

        if (!empty($filters['prix_min'])) {
            $query->where('prix', '>=', $filters['prix_min']);
        }

        if (!empty($filters['prix_max'])) {
            $query->where('prix', '<=', $filters['prix_max']);
        }

        if (!empty($filters['statut'])) {
            $query->where('statut', $filters['statut']);
        }

        if (!empty($filters['volant'])) {
            $query->where('volant', $filters['volant']);
        }

        if (!empty($filters['annee_min'])) {
            $query->where('annee', '>=', $filters['annee_min']);
        }

        if (!empty($filters['annee_max'])) {
            $query->where('annee', '<=', $filters['annee_max']);
        }

        if (!empty($filters['climatisation'])) {
            $query->where('climatisation', $filters['climatisation']);
        }

        if (!empty($filters['carrosserie_id'])) {
            $query->where('carrosserie_id', $filters['carrosserie_id']);
        }

        if (!empty($filters['couleur_id'])) {
            $query->where('couleur_id', $filters['couleur_id']);
        }

        if (!empty($filters['carburant_id'])) {
            $query->where('carburant_id', $filters['carburant_id']);
        }
        if (!empty($filters['transmission_id'])) {
            $query->where('transmission_id', $filters['transmission_id']);
        }

        // Tri
        if (!empty($filters['sort_by'])) {
            switch ($filters['sort_by']) {
                case 'dc': $query->orderBy('date_annonce', 'asc'); break;
                case 'dd': $query->orderBy('date_annonce', 'desc'); break;
                case 'kc': $query->orderBy('kilometrage', 'asc'); break;
                case 'kd': $query->orderBy('kilometrage', 'desc'); break;
                case 'ac': $query->orderBy('annee', 'asc'); break;
                case 'ad': $query->orderBy('annee', 'desc'); break;
                case 'pc': $query->orderBy('prix', 'asc'); break;
                case 'pd': $query->orderBy('prix', 'desc'); break;
            }
        }

        // Pagination
        $perPage = $request->input('per_page', 15);
        $annonces = $query->paginate($perPage);

        return response()->json($annonces);
    }

    public function getFilteredAnnoncesMoto(Request $request)
    {
        // Récupérer tous les paramètres de la requête
        $filters = $request->all();

        // Construire la requête de base et charger les relations
        $query = Annonce::with(['modele.marque', 'couleur', 'carburant', 'transmission'])
                ->whereHas('carrosserie', function($q){
                    $q->where('isMoto', true);
                });

        // Recherche par mot-clé (appliquée sur moteur, prix, annee, etc.)
        if (!empty($filters['keyword'])) {
            $keyword = $filters['keyword'];
            $query->where(function ($q) use ($keyword) {
                $q->where('moteur', 'ILIKE', "%$keyword%")
                  ->orWhereHas('modele', function ($q) use ($keyword) {
                      $q->where('label', 'ILIKE', "%$keyword%");
                  })
                  ->orWhereHas('modele.marque', function ($q) use ($keyword) {
                      $q->where('label', 'ILIKE', "%$keyword%");
                  });
            });
        }

        // Filtres sur les relations
        if (!empty($filters['marque_id'])) {
            $query->whereHas('modele.marque', function ($q) use ($filters) {
                $q->where('id', $filters['marque_id']);
            });
        }

        if (!empty($filters['modele_id'])) {
            $query->where('modele_id', $filters['modele_id']);
        }

        // Autres filtres (kilométrage, prix, etc.)
        if (!empty($filters['kilometrage_min'])) {
            $query->where('kilometrage', '>=', $filters['kilometrage_min']);
        }

        if (!empty($filters['kilometrage_max'])) {
            $query->where('kilometrage', '<=', $filters['kilometrage_max']);
        }

        if (!empty($filters['prix_min'])) {
            $query->where('prix', '>=', $filters['prix_min']);
        }

        if (!empty($filters['prix_max'])) {
            $query->where('prix', '<=', $filters['prix_max']);
        }

        if (!empty($filters['statut'])) {
            $query->where('statut', $filters['statut']);
        }

        if (!empty($filters['volant'])) {
            $query->where('volant', $filters['volant']);
        }

        if (!empty($filters['annee_min'])) {
            $query->where('annee', '>=', $filters['annee_min']);
        }

        if (!empty($filters['annee_max'])) {
            $query->where('annee', '<=', $filters['annee_max']);
        }

        if (!empty($filters['climatisation'])) {
            $query->where('climatisation', $filters['climatisation']);
        }

        if (!empty($filters['carrosserie_id'])) {
            $query->where('carrosserie_id', $filters['carrosserie_id']);
        }

        if (!empty($filters['couleur_id'])) {
            $query->where('couleur_id', $filters['couleur_id']);
        }

        if (!empty($filters['carburant_id'])) {
            $query->where('carburant_id', $filters['carburant_id']);
        }
        if (!empty($filters['transmission_id'])) {
            $query->where('transmission_id', $filters['transmission_id']);
        }

        // Tri
        if (!empty($filters['sort_by'])) {
            switch ($filters['sort_by']) {
                case 'dc': $query->orderBy('date_annonce', 'asc'); break;
                case 'dd': $query->orderBy('date_annonce', 'desc'); break;
                case 'kc': $query->orderBy('kilometrage', 'asc'); break;
                case 'kd': $query->orderBy('kilometrage', 'desc'); break;
                case 'ac': $query->orderBy('annee', 'asc'); break;
                case 'ad': $query->orderBy('annee', 'desc'); break;
                case 'pc': $query->orderBy('prix', 'asc'); break;
                case 'pd': $query->orderBy('prix', 'desc'); break;
            }
        }

        // Pagination
        $perPage = $request->input('per_page', 15);
        $annonces = $query->paginate($perPage);

        return response()->json($annonces);
    }


    // Méthode pour créer une nouvelle annonce
    public function store(Request $request)
    {
        $request->validate([
            'annee' => 'required|integer',
            'kilometrage' => 'required|integer',
            'prix' => 'required|numeric',
            'statut' => 'required|integer',
            'volant' => 'required|integer',
            'climatisation' => 'required|integer',
            'moteur' => 'required|string|max:255',
            'carrosseries' => 'required|integer',
            'date_annonce' => 'required|date',
            'etat' => 'required|integer',
            'modele_id' => 'required|exists:modeles,id',
            'carburant_id' => 'required|exists:carburants,id',
            'boite_id' => 'required|exists:boites,id',
            'couleur_id' => 'required|exists:couleurs,id',
            'utilisateur_id' => 'required|exists:utilisateurs,id',
        ]);

        $annonce = Annonce::create($request->all());

        return response()->json($annonce, 201);
    }

    // Méthode pour afficher une annonce spécifique
    public function show($id)
    {
        $annonce = Annonce::with(['modele.marque', 'couleur', 'carrosserie', 'carburant', 'transmission', 'images', 'utilisateur'])->find($id);

        if (!$annonce) {
            return response()->json(['message' => 'Annonce non trouvée'], 404);
        }

        return response()->json($annonce);
    }

    // Méthode pour mettre à jour une annonce existante
    public function update(Request $request, $id)
    {
        $annonce = Annonce::find($id);

        if (!$annonce) {
            return response()->json(['message' => 'Annonce non trouvée'], 404);
        }

        $request->validate([
            'annee' => 'sometimes|required|integer',
            'kilometrage' => 'sometimes|required|integer',
            'prix' => 'sometimes|required|numeric',
            'statut' => 'sometimes|required|integer',
            'volant' => 'sometimes|required|integer',
            'climatisation' => 'sometimes|required|integer',
            'moteur' => 'sometimes|required|string|max:255',
            'carrosseries' => 'sometimes|required|integer',
            'date_annonce' => 'sometimes|required|date',
            'etat' => 'sometimes|required|integer',
            'modele_id' => 'sometimes|required|exists:modeles,id',
            'carburant_id' => 'sometimes|required|exists:carburants,id',
            'boite_id' => 'sometimes|required|exists:boites,id',
            'couleur_id' => 'sometimes|required|exists:couleurs,id',
            'utilisateur_id' => 'sometimes|required|exists:utilisateurs,id',
        ]);

        $annonce->update($request->all());

        return response()->json($annonce);
    }

    // Méthode pour supprimer une annonce (changement de l'état à -1)
    public function destroy($id)
    {
        $annonce = Annonce::find($id);

        if (!$annonce) {
            return response()->json(['message' => 'Annonce non trouvée'], 404);
        }

        // On change l'état à -1 pour indiquer qu'elle est supprimée
        $annonce->etat = -1;
        $annonce->save();

        return response()->json(['message' => 'Annonce marquée comme supprimée']);
    }
}
