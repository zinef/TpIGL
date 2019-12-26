<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Mockery;
use Tests\TestCase;

class ProfesseurControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /*les méthoes de tests de méthodes de la classe ProfesseurController */
    /*la classe la plus utilisé dans notre cas "les deux CU's choisis concerne le professeur" */

    //test de la methode ajouter note
    public function testAjouterNote(){

        //création du Mock1 pour la note
        $mockNote= Mockery::mock('Note');
        
    }

    //test de la méthode index
    public function testIndex(){

    }

    //test de la méthode affichageInfos
    public function testAffichageInfos(){

    }
}
