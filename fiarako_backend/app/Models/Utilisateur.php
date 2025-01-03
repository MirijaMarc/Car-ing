<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    use HasFactory;

    protected $table = 'utilisateurs';

    protected $fillable = [
        'nom',
        'mdp',
        'email',
        'telephone',
        'etat',
    ];

    public function annonces()
    {
        return $this->hasMany(Annonce::class, 'utilisateur_id');
    }

    public function vues()
    {
        return $this->hasMany(Vue::class, 'utilisateur_id');
    }

    public function enregistrements()
    {
        return $this->hasMany(Enregistrement::class, 'utilisateur_id');
    }

    public function offres()
    {
        return $this->hasMany(Offre::class, 'utilisateur_id');
    }
}
