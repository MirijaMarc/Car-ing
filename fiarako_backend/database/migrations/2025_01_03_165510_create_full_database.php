<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Table utilisateurs
        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('mdp');
            $table->string('email')->unique();
            $table->string('telephone');
            $table->integer('etat')->default(1)->check('etat IN (0, 1)');
        });

        // Table marques
        Schema::create('marques', function (Blueprint $table) {
            $table->id();
            $table->string('label');
            $table->integer('etat')->default(1)->check('etat IN (0, 1)');
        });

        // Table modeles
        Schema::create('modeles', function (Blueprint $table) {
            $table->id();
            $table->string('label');
            $table->integer('etat')->default(1)->check('etat IN (0, 1)');
            $table->foreignId('marque_id')->constrained('marques');
        });

        // Table carrosseries
        Schema::create('carrosseries', function (Blueprint $table) {
            $table->id();
            $table->string('label');
            $table->boolean('isMoto');
            $table->integer('etat')->default(1)->check('etat IN (0, 1)');
        });

        // Table carburants
        Schema::create('carburants', function (Blueprint $table) {
            $table->id();
            $table->string('label');
            $table->integer('etat')->default(1)->check('etat IN (0, 1)');
        });

        // Table transmissions
        Schema::create('transmissions', function (Blueprint $table) {
            $table->id();
            $table->string('label');
            $table->integer('etat')->default(1)->check('etat IN (0, 1)');
        });

        // Table couleurs
        Schema::create('couleurs', function (Blueprint $table) {
            $table->id();
            $table->string('label');
            $table->integer('etat')->default(1)->check('etat IN (0, 1)');
        });

        // Table annonces
        Schema::create('annonces', function (Blueprint $table) {
            $table->id();
            $table->integer('annee');
            $table->integer('kilometrage');
            $table->decimal('prix');
            $table->integer('statut');
            $table->integer('volant');
            $table->integer('climatisation');
            $table->string('moteur');
            $table->date('date_annonce');
            $table->integer('etat');
            $table->foreignId('modele_id')->constrained('modeles');
            $table->foreignId('carburant_id')->constrained('carburants');
            $table->foreignId('boite_id')->constrained('transmissions');
            $table->foreignId('couleur_id')->constrained('couleurs');
            $table->foreignId('utilisateur_id')->constrained('utilisateurs');
            $table->foreignId('carrosserie_id')->constrained('carrosseries');
            $table->foreignId('transmission_id')->constrained('transmissions');

        });

        // Table images
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string('label');
            $table->foreignId('annonce_id')->constrained('annonces');
            $table->integer('etat')->default(1)->check('etat IN (0, 1)');
        });

        // Table vues
        Schema::create('vues', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->foreignId('utilisateur_id')->constrained('utilisateurs');
            $table->foreignId('annonce_id')->constrained('annonces');
        });

        // Table enregistrements
        Schema::create('enregistrements', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->foreignId('utilisateur_id')->constrained('utilisateurs');
            $table->foreignId('annonce_id')->constrained('annonces');
        });

        // Table offres
        Schema::create('offres', function (Blueprint $table) {
            $table->id();
            $table->decimal('prix');
            $table->string('label');
            $table->string('email');
            $table->string('telephone');
            $table->integer('etat');
            $table->foreignId('annonce_id')->constrained('annonces');
            $table->foreignId('utilisateur_id')->constrained('utilisateurs');
        });

        // Table offres
        Schema::create('tris', function (Blueprint $table) {
            $table->id();
            $table->string('label');
            $table->string('code');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tris');
        Schema::dropIfExists('offres');
        Schema::dropIfExists('enregistrements');
        Schema::dropIfExists('vues');
        Schema::dropIfExists('images');
        Schema::dropIfExists('annonces');
        Schema::dropIfExists('couleurs');
        Schema::dropIfExists('transmissions');
        Schema::dropIfExists('carburants');
        Schema::dropIfExists('carrosseries');
        Schema::dropIfExists('modeles');
        Schema::dropIfExists('marques');
        Schema::dropIfExists('utilisateurs');
    }
};
