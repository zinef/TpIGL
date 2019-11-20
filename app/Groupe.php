<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    //
    /*les attributs de la classe modèle groupe*/
    protected $fillable = [
        'numero',
    ];

    /**
     * les methodes de creation de relations entre les modèles
     */

     /*public function etudiants(){
         return $this->hasMany("app/Etudiant");
     } */

}
