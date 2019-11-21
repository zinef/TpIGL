<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    //
    /*les attributs de la classe modèle module */

    protected $fillable = [
        'code','coefficient','credit','semestre',
    ];

    /*les methodes de creation de relation entre les classes modèles*/
    public function professeurs(){
        return $this->belongsToMany("App/Professeur");
    }
    public function etudiants(){
        return $this->belongsToMany('App/Etudiant');
    }
    public function notes(){
        return $this->hasMany('App/Note');
    }
}
