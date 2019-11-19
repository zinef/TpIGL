<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Administrateur extends User
{
    //
    /*les attributs de la classe modèle administrateur*/
    protected $type;
    protected $profession;
}
