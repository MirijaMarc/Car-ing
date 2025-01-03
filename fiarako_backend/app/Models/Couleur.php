<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Couleur extends Model
{
    use HasFactory;

    protected $table = 'couleurs';

    protected $fillable = [
        'label',
        'etat',
    ];

    public function annonces()
    {
        return $this->hasMany(Annonce::class, 'couleur_id');
    }
}
