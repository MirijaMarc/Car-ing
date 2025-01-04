<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // Désactiver les contraintes de clés étrangères
        Schema::disableForeignKeyConstraints();

        // Vider les tables
        DB::table('utilisateurs')->truncate();
        DB::table('marques')->truncate();
        DB::table('modeles')->truncate();
        DB::table('carrosseries')->truncate();
        DB::table('carburants')->truncate();
        DB::table('transmissions')->truncate();
        DB::table('couleurs')->truncate();
        DB::table('annonces')->truncate();

        // Réactiver les contraintes de clés étrangères
        Schema::enableForeignKeyConstraints();

        // User::factory(10)->create();
        // Insérer les utilisateurs
        DB::table('utilisateurs')->insert([
            [
                'nom' => 'Jean Dupont',
                'mdp' => Hash::make('password123'),
                'email' => 'jean.dupont@example.com',
                'telephone' => '0612345678',
                'etat' => 10,
            ],
            [
                'nom' => 'Marie Curie',
                'mdp' => Hash::make('securePass456'),
                'email' => 'marie.curie@example.com',
                'telephone' => '0698765432',
                'etat' => 10,
            ],
            [
                'nom' => 'Paul Martin',
                'mdp' => Hash::make('hashMe789'),
                'email' => 'paul.martin@example.com',
                'telephone' => '0623456789',
                'etat' => 10,
            ],
        ]);

        // Insérer les marques
        DB::table('marques')->insert([
            ['label' => 'Toyota', 'etat' => 10],
            ['label' => 'Renault', 'etat' => 10],
            ['label' => 'Tesla', 'etat' => 10],
        ]);

        // Insérer les modèles
        DB::table('modeles')->insert([
            ['label' => 'Corolla', 'etat' => 10, 'marque_id' => 1],
            ['label' => 'Clio', 'etat' => 10, 'marque_id' => 2],
            ['label' => 'Model 3', 'etat' => 10, 'marque_id' => 3],
        ]);

        // Insérer les carrosseries
        DB::table('carrosseries')->insert([
            ['label' => 'Berline', 'etat' => 10],
            ['label' => 'SUV', 'etat' => 10],
            ['label' => 'Hatchback', 'etat' => 10],
        ]);

        // Insérer les carburants
        DB::table('carburants')->insert([
            ['label' => 'Essence', 'etat' => 10],
            ['label' => 'Diesel', 'etat' => 10],
            ['label' => 'Électrique', 'etat' => 10],
        ]);

        // Insérer les transmissions
        DB::table('transmissions')->insert([
            ['label' => 'Manuelle', 'etat' => 10],
            ['label' => 'Automatique', 'etat' => 10],
        ]);

        // Insérer les couleurs
        DB::table('couleurs')->insert([
            ['label' => 'Rouge', 'etat' => 10],
            ['label' => 'Bleu', 'etat' => 10],
            ['label' => 'Noir', 'etat' => 10],
        ]);

        // Insérer les annonces
        DB::table('annonces')->insert([
            [
                'immatriculation' => 'AB-123-CD',
                'annee' => 2018,
                'kilometrage' => 50000,
                'prix' => 15000.00,
                'statut' => 1,
                'volant' => 1,
                'climatisation' => 1,
                'moteur' => '1.6L',
                'date_annonce' => '2025-01-01',
                'etat' => 10,
                'modele_id' => 1,
                'carburant_id' => 1,
                'boite_id' => 1,
                'couleur_id' => 1,
                'utilisateur_id' => 1,
            ],
            [
                'immatriculation' => 'EF-456-GH',
                'annee' => 2020,
                'kilometrage' => 30000,
                'prix' => 25000.00,
                'statut' => 1,
                'volant' => 1,
                'climatisation' => 1,
                'moteur' => '2.0L',
                'date_annonce' => '2025-01-02',
                'etat' => 10,
                'modele_id' => 2,
                'carburant_id' => 2,
                'boite_id' => 2,
                'couleur_id' => 2,
                'utilisateur_id' => 2,
            ],
        ]);
    }
}
