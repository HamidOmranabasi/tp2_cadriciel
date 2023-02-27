<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fichier extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'titre_fr',
        'path',
        'etudientsId',
        'ext',
        'size'
    ];
}
