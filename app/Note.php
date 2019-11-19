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
}
