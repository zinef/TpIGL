<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note ;
use App\User ;
use App\Etudiant ;
use App\Professeur;
use App\Module;
class ProfesseurController extends Controller
{

    /* les méthodes qui controllent l'affetation des notes*/
    public function affectationDesNotes(Request $request){
        $exam=request('exam');
        $niveau=request('niveau');
        $group=request('group');
        $moduleCode=request('module');
        $idEtudiant=request('id');
        $module=Module::where('code',$moduleCode)->get(); 
        $moduleId=$module[0]->id;
        $note =Note::where('etudiant_id',$idEtudiant)->where('module_id',$moduleId)->get();
        if (!empty($note[0])){//modification d'une note existante déja
                $noteId=$note[0]->id;
                $note=Note::find($noteId);
                if($exam == "CC"){
                    $note -> cc= request('note') ;
                }
                if ($exam =="CF"){
                    $note -> cf= request('note') ;
                }
                if($exam =="CI"){
                    $note -> ci= request('note') ;
                }
                $note->moyenne = (($note -> ci) +($note -> cc) +2*($note -> cf))/4 ;
                $note->save();
        }else{

            $note = new Note();

            if($exam == "CC"){
                $note -> cc= request('note') ;
            }
            if ($exam =="CF"){
                $note -> cf= request('note') ;
            }
            if($exam =="CI"){
                $note -> ci= request('note') ;
            }
            $note->moyenne = (($note -> ci) +($note -> cc) +2*($note -> cf))/4 ;
            $note->etudiant_id = $idEtudiant;
            $note->module_id= $moduleId;  
            $note->save();
        }
        
        return response()->json(['success' => 'success'], 200);
    }
    public function index(Request $request){
        if (count($request->all())) {
        $niveau=request('niveau');
        $groupe=request('group');
        //$module=request('module');
        $etudiantsAAfficher=Etudiant::where('niveau',$niveau)->where('groupe_id',$groupe)->get();
        $data=[

        ];
        foreach($etudiantsAAfficher as $etudiant){
            $idEtudiant=$etudiant->id;
            $user=User::find($idEtudiant);
            $datatoadd=[
                "id"=>$idEtudiant,
                "nom"=>$user->surname,
                "prenom"=>$user->name,
                "matricule"=>$etudiant->matricule
            ];
            array_push($data,$datatoadd);
        }

        return response()->json($data);
        }
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
