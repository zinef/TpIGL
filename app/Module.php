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
   /* public function professeurs(){
        return $this->hasMany("app/Professeur");
    }*/

}
