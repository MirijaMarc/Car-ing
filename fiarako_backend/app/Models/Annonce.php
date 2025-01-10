<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    use HasFactory;

    protected $table = 'annonces';

    protected $fillable = [
        'immatriculation',
        'annee',
        'kilometrage',
        'prix',
        'statut',
        'volant',
        'climatisation',
        'moteur',
        'date_annonce',
        'etat',
        'modele_id',
        'carburant_id',
        'transmission_id',
        'couleur_id',
        'utilisateur_id',
        'carrosserie_id'
    ];

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, 'utilisateur_id');
    }

    public function modele()
    {
        return $this->belongsTo(Modele::class, 'modele_id');
    }

    public function carrosserie()
    {
        return $this->belongsTo(Carrosserie::class, 'carrosserie_id');
    }

    public function carburant()
    {
        return $this->belongsTo(Carburant::class, 'carburant_id');
    }

    public function couleur()
    {
        return $this->belongsTo(Couleur::class, 'couleur_id');
    }

    public function transmission()
    {
        return $this->belongsTo(Transmission::class, 'transmission_id');
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'annonce_id');
    }

    public function vues()
    {
        return $this->hasMany(Vue::class, 'annonce_id');
    }

    public function enregistrements()
    {
        return $this->hasMany(Enregistrement::class, 'annonce_id');
    }

    public function offres()
    {
        return $this->hasMany(Offre::class, 'annonce_id');
    }

}
