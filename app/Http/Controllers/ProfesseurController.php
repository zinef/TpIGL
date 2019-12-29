<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note ;
use App\User ;
use App\Etudiant ;
use App\Professeur;
class ProfesseurController extends Controller
{

    /* les méthodes qui controllent l'affetation des notes*/
   public function ajouterNote($id){
        $note = new Note() ; 
        $note -> ci= request('ci') ;
        $note -> cf= request('cf') ;
        $note -> cc= request('cc') ;
        $note->etudiant_id = $id;
        $note-> moyenne = (($note -> ci) +($note -> cc) +2*($note -> cf))/4 ;

        $note -> save() ;
        return redirect('/saisirNotes') ;
    }

    public function affectationDesNotes(Request $request){
        $exam=request('exam');
        $niveau=request('niveau');
        $group=request('group');
        $moduleCode=request('module');
        $idEtudiant=request('id');
        $moduleId=Module::where('code',$moduleCode)->get();
        $note =Note::where('etudiant_id',$id)->where('module_id',$moduleId);
        if ($note != null){//modification d'une note existante déja
                if($exam == "cc"){
                    $note -> cc= request('cc') ;
                }
                if ($exam =="cf"){
                    $note -> cf= request('cf') ;
                }
                if($exam =="ci"){
                    $note -> ci= request('ci') ;
                }
                $note->moyenne = (($note -> ci) +($note -> cc) +2*($note -> cf))/4 ;
        }else{
            $note = new Note();

            if($exam == "cc"){
                $note -> cc= request('cc') ;
            }
            if ($exam =="cf"){
                $note -> cf= request('cf') ;
            }
            if($exam =="ci"){
                $note -> ci= request('ci') ;
            }
            $note->moyenne = (($note -> ci) +($note -> cc) +2*($note -> cf))/4 ;
            $note->etudiant_id = $id;
            $note->module_id= $moduleId;
        }
        $note->save();
    }
    public function index($id){

        $listetudiant=Etudiant::where('groupe_id',$id)->get();
        return view('index',['etudiant'=>$listetudiant]) ;
    }

    public function create(Request $request){
     
    }

    /*les méthodes qui controllent l'affichage des information */

    public function affichageInfos($id){
       /* $user= Auth::user();
        $id=$user->id;*/
        //recherche dans la collone 'id' de la table professeur
        $user=User::find($id);
        $queryProfesseur=Professeur::find($id);
        if (($queryProfesseur != null)&&($user != null)){
            /*récuperer les données à afficher dans un tableau et les envoyer dans une vue */ 
            $data=[
                "identifiant"=> $user->identifiant,
                "name"=> $user->name ,
                "surname"=> $user->surname ,
                "email"=> $user->email ,
                "telephone"=> $user->telephone ,
                "adresse"=> $user->adresse ,
                "dateDeNaissance"=> $user->dateDeNaissance ,
                "specialites"=> $queryProfesseur->specialites ,
                "grade"=> $queryProfesseur->grade ,

            ];
            return $data;
        }
    }

    
   // use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */

    //protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
   /* public function __construct()
    {
        $this->middleware('guest');
    }*/

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
/*
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'ci' => ['required', 'string', 'max:255'],
            'cf' => ['required', 'string', 'max:255'],
            'cc' => ['required', 'string', 'max:255'],
           
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Note
     */
    /*
    protected function create(array $data)
    {
        return Note::create([
            'ci' => $data['ci'],
            'cf' => $data['cf'],
            'cc' => $data['cc'],
       
        ]);
    }*/
}
