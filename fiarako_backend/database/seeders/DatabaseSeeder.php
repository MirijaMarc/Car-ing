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

        // Insérer les marques, modèles, carrosseries, carburants, transmissions et couleurs
        DB::table('marques')->insert([
            ['label' => 'Toyota', 'etat' => 10],
            ['label' => 'Renault', 'etat' => 10],
            ['label' => 'Honda', 'etat' => 20],
        ]);

        DB::table('modeles')->insert([
            ['label' => 'Corolla', 'etat' => 10, 'marque_id' => 1],
            ['label' => 'Clio', 'etat' => 10, 'marque_id' => 2],
            ['label' => 'CBR600RR', 'etat' => 20, 'marque_id' => 3],
        ]);

        DB::table('carrosseries')->insert([
            ['label' => 'Berline', 'isMoto' => false, 'etat' => 10],
            ['label' => 'SUV', 'isMoto' => false, 'etat' => 10],
            ['label' => 'Moto', 'isMoto' => true, 'etat' => 20],
        ]);

        DB::table('carburants')->insert([
            ['label' => 'Essence', 'etat' => 10],
            ['label' => 'Diesel', 'etat' => 10],
            ['label' => 'Électrique', 'etat' => 10],
        ]);

        DB::table('transmissions')->insert([
            ['label' => 'Manuelle', 'etat' => 10],
            ['label' => 'Automatique', 'etat' => 10],
        ]);

        DB::table('couleurs')->insert([
            ['label' => 'Rouge', 'etat' => 10],
            ['label' => 'Bleu', 'etat' => 10],
            ['label' => 'Noir', 'etat' => 10],
        ]);

        // Générer 20 annonces (10 voitures et 10 motos)
        $annonces = [];
        for ($i = 1; $i <= 10; $i++) {
            $annonces[] = [
                'annee' => rand(2015, 2023),
                'kilometrage' => rand(10000, 150000),
                'prix' => rand(10000, 30000),
                'statut' => 1,
                'volant' => 1,
                'climatisation' => rand(0, 1),
                'moteur' => '1.' . rand(4, 8) . 'L',
                'date_annonce' => now()->subDays(rand(0, 365)),
                'etat' => 10,
                'modele_id' => rand(1, 2),
                'carburant_id' => rand(1, 3),
                'boite_id' => rand(1, 2),
                'couleur_id' => rand(1, 3),
                'utilisateur_id' => rand(1, 3),
                'carrosserie_id' => rand(1, 2),
            ];
        }

        for ($i = 1; $i <= 10; $i++) {
            $annonces[] = [
                'annee' => rand(2010, 2023),
                'kilometrage' => rand(5000, 80000),
                'prix' => rand(3000, 15000),
                'statut' => 1,
                'volant' => 0,
                'climatisation' => 0,
                'moteur' => '600cc',
                'date_annonce' => now()->subDays(rand(0, 365)),
                'etat' => 20,
                'modele_id' => 3,
                'carburant_id' => 1,
                'boite_id' => 1,
                'couleur_id' => rand(1, 3),
                'utilisateur_id' => rand(1, 3),
                'carrosserie_id' => 3,
            ];
        }

        DB::table('annonces')->insert($annonces);
    }

}
