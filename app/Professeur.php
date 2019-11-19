<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professeur extends User
{
    //
    /*les attributs de la classe modèle professeur*/
    protected $grade;
    protected $specialites;
    protected $diplomes;
}
