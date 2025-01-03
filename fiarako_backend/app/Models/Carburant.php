<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carburant extends Model
{
    use HasFactory;

    protected $table = 'carburants';

    protected $fillable = [
        'label',
        'etat',
    ];

    public function annonces()
    {
        return $this->hasMany(Annonce::class, 'carburant_id');
    }
}
