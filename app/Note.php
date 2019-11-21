<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    //
    /*les attributs de la classe modèle note*/

    protected $fillable = [
        'moyenne','ci','cc','cf',
    ];

    /* les methodes de creation de relation entre les */
    public function etudiant() {
        return $this->belongsTo("App/Etudiant");
    }
    public function module(){
        return $this->belongsTo('App/Module');
    }

}

