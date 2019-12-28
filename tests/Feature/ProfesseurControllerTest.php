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
        
    }

    //test de la méthode index
    public function testIndex(){
        //céation de la  collection pour etudiant
        $collection = new Collection;
        //remplissage de la collection 
        ///Dans ce cas on gènere quelques etudiants de cette manière ["nom"=>"etudiant".$i] ou "i" une variable de controle d'une boucle
        $i=rand(0,10);
        while($i--){
            $collection->add((object)["NomEtud"=>"Etudiant".$i]);
        }
        //création du Mock pour etudiant
        $mockEtudiant=Mockery::mock('Etudiant');
        $mockEtudiant->shouldReceive('where')
                     ->once()
                     ->andReturn($collection);

        //création du lien entre le mock et le conteneur de laravel 
        $this->app->instance('Etudiant',$mockEtudiant);

        //action que fait cette méthode
        $response=$this->call('GET','liste/1');
        
        //Assertions
        $response->assertOk();
        $response->assertViewIs('index');
    }

    //test de la méthode affichageInfos
    public function testAffichageInfos(){
        //création d'un user (professeur)
        //NOTABENE:peu importe l'id dans ce cas je veux juste tester le bout de code de l'affichage et ses vues
        $user=User::create([
            "identifiant"=> "usertest",
            "name"=>  "username",
            "surname"=>  "usersurname",
            "email"=>  "sample@esi.dz",
            "telephone"=>  "+213xxxxxxxxx",
            "adresse"=>  "unknown",
            "dateDeNaissance"=>  "xx-xx-xxxx",
        ]);

        $professeurUser=Professeur::create([
            "specialites"=> "Informatique/Mathématique" ,
            "grade"=> "Maitre de conf B" ,
        ]);

        //création du mock pour l'utilisateur (user en tantque professeur )
        $mockUser=Mockery::mock('User');
        $mockProfesseurUser=Mockery::mock('Professeur');
        $mockUser->shouldReceive('find')
                 ->once()
                 ->andReturn($user);

        $mockProfesseurUser->shouldReceive(find)
                           ->once()
                           ->andReturn($professeurUser);

        //création de liens entre les mocks et le conteneur de laravel 
        $this->app->instance('User',$mockUser);
        $this->app->instance('Professeur',$mockProfesseurUser);

        //action que fait cette methode
        //$response= $this->call('GET','');
        
        //Assertions
        //$response->assertOk();
        //$response->assertViewIs();
        
    }

    //la methode tearDown qui détruit le mock crée 
    public function tearDown()
    {
        Mockery::close();
    }
}
