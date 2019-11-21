<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professeur extends User
{
    //
    /*les attributs de la classe modèle professeur*/
    protected $fillable = [
        'grade','specialites','diplomes',
    ];

    /*les methodes de creation des relations entre les autres modèles */ 
    public function etudiants(){
        return $this-> belongsToMany("App/Etudiant");
    }

    public function modules(){
        return $this->hasMany("App/Module");
    }

    public function groupes(){
        return $this->hasMany("App/Groupe");
    }


}
