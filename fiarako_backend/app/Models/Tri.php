<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tri extends Model
{
    use HasFactory;

    protected $table = 'tris';

    protected $fillable = [
        'label',
    ];
}
