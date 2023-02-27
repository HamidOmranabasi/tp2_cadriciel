<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'titre_fr',
        'contenu',
        'contenu_fr',
        'date',
        'etudientsId',
    ];

    public function postHasUser(){
        return $this->hasOne('App\Models\User', 'id', 'etudientsId');
    }

}
