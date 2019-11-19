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
        return $this->belongsToMany('/app/Module');
    }

    public function professeurs(){
        return $this->hasMany('/app/Professeur');
    }
    public function group(){
        return $this->belongsTo('/app/Groupe');
    }
    public function notes(){
        return $this->hasMany('/app/Note');
    }
    public function absences(){
        return $this->hasMany('/app/Absence');
    }
}
