<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class SelAutTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    /**
     * le test automatique selenium ecrit ici
     * pour le test d'une fonctionnalité comme demander 
     * cette fonctionnalité c'est celle d'affichage des notes 
     */
    public function testAutoAffichageDesNotes()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->click('@suivant')
                    ->click('@login')
                    ->click('@afficherNotes')
                    ->select('niveau','1CS')
                    ->select('group','9')
                    ->select('module','SYC')
                    ->click('@submit-button')
                    ->assertSee('17/0169');
        });
    }
}
