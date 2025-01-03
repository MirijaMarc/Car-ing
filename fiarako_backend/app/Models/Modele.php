<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modele extends Model
{
    use HasFactory;

    protected $table = 'modeles';

    protected $fillable = [
        'label',
        'etat',
        'marque_id',
    ];

    public function marque()
    {
        return $this->belongsTo(Marque::class, 'marque_id');
    }

    public function annonces()
    {
        return $this->hasMany(Annonce::class, 'modele_id');
    }
}
