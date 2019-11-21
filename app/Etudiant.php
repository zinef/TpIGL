<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etudiant extends User
{
    //
    /* Les attributs de la classe modèle etudiant*/
    
    protected $fillable = [
        'matricule',
    ];

    /* les methodes de creation de relation entre les tables (integrités)*/
    public function modules(){
        return $this->belongsToMany('App/Module');
    }

    public function professeurs(){
        return $this->belongsToMany('App/Professeur');
    }
    public function groupes(){
        return $this->belongsTo('App/Groupe');
    }
    public function notes(){
        return $this->hasMany('App/Note');
    }
    public function absences(){
        return $this->hasMany('App/Absence');
    }
}
