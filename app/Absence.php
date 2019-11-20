<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    //
    protected $fillable = [
        'date',
    ];

    /**
     * les methodes de generation des liens entres les tables
     */

    /* public function etudiant(){
         return $this->hasOne("app/Etudiant");
     }*/

}
