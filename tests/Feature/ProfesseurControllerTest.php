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

    /*les méthoes de tests de méthodes de la classe ProfesseurController */
    /*la classe la plus utilisé dans notre cas "les deux CU's choisis concerne le professeur" */

    //test de la methode ajouter note
    /*public function testAjouterNote(){
        
    }*/

    //test de la méthode index
    public function testIndex(){
        //création des collections (User,Etudiant ,Module,Note) 
        //préparation des données
        //$collectionModule=new Collection;
        $collectionModule=(object)[
            "id"=>"1",
            "code" =>"SYC",
            "coefficient"=>"5",
            "credit"=>"5",
            "semestre"=>"5",

        ];

        //$collectionUser = new Collection;
        $collectionUser=(object)[
            "id"=>"5",
            "name" =>"Zine-eddine",
            "surname"=>"fodil",
            "email"=>"hz_fodil@esi.dz",
            "telephone"=>"0000000000",
            "adresse"=>"boghni",
            "dateDeNaissance"=>"06-09-1999",
            "nationalite" =>"algerienne",
        ];

        //$collectionEtudiant=new Collection;
        $collectionEtudiant=(object)[
            "id"=>"5",
            "matricule" =>"17/0169",
            "niveau"=>"1CS",
            "groupe_id"=>"9",
        ];

        //$collectionNote=new Collection;
        $collectionNote=(object)[
            "id"=>"2",
            "moyenne" =>"15",
            "ci"=>"15",
            "cc"=>"15",
            "cf"=>"15",
            "etudiant_id" =>"5",
            "module_id"=>"1",
        ];

        //création des mocks pour simuler les autres classes 
        //création du mock du module
        $mockModule=Mockery::mock('Module');
        $mockModule->shouldReceive('where','get')
                   ->andReturn($collectionModule);
               
        //création du Mock pour etudiant
        $mockEtudiant=Mockery::mock('Etudiant');
        $mockEtudiant->shouldReceive('where','get','find')
                     ->andReturn($collectionEtudiant);

        //création du mock pour user
        $mockUser=Mockery::mock('User');
        $mockUser->shouldReceive('find')
                 ->andReturn($collectionUser);

        //création du mock pour note
        $mockNote=Mockery::mock('Note');
        $mockNote->shouldReceive('where','get')
                 ->andReturn($collectionNote);

        //création des liens entre les mocks et le conteneur de laravel 
        $this->app->instance('Etudiant',$mockEtudiant);
        $this->app->instance('Module',$mockModule);
        $this->app->instance('User',$mockUser);
        $this->app->instance('Note',$mockNote);

        //action que fait cette méthode
        $response=$this->call('GET','/Enseignant/Note');
        

        $data=[
            "id"=>$collectionEtudiant->id,
            "matricule"=>$collectionEtudiant->matricule,
            "nom"=>$collectionUser->surname,
            "prenom"=>$collectionUser->name,
            "cc"=>$collectionNote->cc,
            "ci"=>$collectionNote->ci,
            "cf"=>$collectionNote->cf,
            "moyenne"=>$collectionNote->moyenne
        ];
        //Assertions
        $response->assertOk();

    }
 
    //test de la méthode affichageInfos
    public function testAffichageInfos(){
        //création d'un user (professeur)
        $user=(object)[
            "id"=>"1",
            "identifiant"=> "usertest",
            "name"=>  "username",
            "surname"=>  "usersurname",
            "email"=>  "sample@esi.dz",
            "telephone"=>  "+213xxxxxxxxx",
            "adresse"=>  "unknown",
            "dateDeNaissance"=>  "xx-xx-xxxx",
        ];

        $professeurUser=(object)[
            "id"=>"1",
            "specialites"=> "Informatique/Mathématique" ,
            "grade"=> "Maitre de conf B" ,
        ];

        //création du mock pour l'utilisateur (user en tantque professeur )
        $mockUser=Mockery::mock('User');
        $mockProfesseurUser=Mockery::mock('Professeur');
        $mockUser->shouldReceive('find')
                 ->andReturn($user);

        $mockProfesseurUser->shouldReceive('find')
                           ->andReturn($professeurUser);

        //création de liens entre les mocks et le conteneur de laravel 
        $this->app->instance('User',$mockUser);
        $this->app->instance('Professeur',$mockProfesseurUser);

        //action que fait cette methode
        $response= $this->call('GET','/informations/1');
        
        $data=[
            "identifiant"=> $user->identifiant,
            "name"=> $user->name ,
            "surname"=> $user->surname ,
            "email"=> $user->email ,
            "telephone"=> $user->telephone ,
            "adresse"=> $user->adresse ,
            "dateDeNaissance"=> $user->dateDeNaissance ,
            "specialites"=> $professeurUser->specialites ,
            "grade"=> $professeurUser->grade ,

        ];
        //Assertions
        $response->assertOk();
    }
}
