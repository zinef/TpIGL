<?php

namespace Tests\Feature;

use Illuminate\Database\Eloquent\Collection;
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
        //céation de la  collection pour note
        $collection = new Collection;
        //remplissage de la collection
        $collection->add((object)($ci=15.0));
        $collection->add((object)($cf=15.0));
        $collection->add((object)($cc=15.0));
        $collection->add((object)($moyenne=15.0));
        $collection->add((object)($etudiant_id=12));

        //création du Mock pour la note
        $mockNote= Mockery::mock('Note');
        $mockNote->shouldReceive('save')
                 ->once()
                 ->andReturn($collection);

        //création  de lien entre le mock et le conteneur de laravel
        $this->app->instance('Note',$mockNote);

        //action que fait cette methode 
        $response = $this->call('POST','/saisirnotes/{id}');

        //Assertions
        $this->assertResponseOk();
        $this->assertViewIs('/saisirnotes');
    }

    //test de la méthode index
    public function testIndex(){

    }

    //test de la méthode affichageInfos
    public function testAffichageInfos(){

    }

    //la methode tearDown qui détruit le mock crée 
    public function tearDown()
    {
        Mockery::close();
    }
}
