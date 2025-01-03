<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrosserie extends Model
{
    use HasFactory;

    protected $table = 'carrosseries';

    protected $fillable = [
        'label',
        'etat',
    ];
}
