<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marque extends Model
{
    use HasFactory;

    protected $table = 'marques';

    protected $fillable = [
        'label',
        'etat',
    ];

    public function modeles()
    {
        return $this->hasMany(Modele::class, 'marque_id');
    }
}
